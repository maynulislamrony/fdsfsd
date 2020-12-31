<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginContoller extends Controller
{
    public function showlogin(){
        return view('auth.login');
    }
    public function loginprocess(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $datacheak=$request->only('email','password');
    
        if (auth()->attempt($datacheak)){
            if(auth()->user()->status==1){
                $notification = array(
                    'message'=>'Login Successfull',
                    'alert-type'=>'success',
                );
                return redirect()->route('dashboard')->with($notification);
            }
        
        }else{
            // session()->flash('error','Username Or Password Does Not Match');
            $notification = array(
                'message'=>'Username Or Password Does Not Match',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logout(){
        Auth::logout();
        $notification = array(
            'message'=>'Logout Successfull',
            'alert-type'=>'success',
        );
        return redirect()->route('/')->with($notification);
    }
//Change Password
    public function createChangePassword()
    {
        return view('auth.changePassword');
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5',
        ],[
            'new_password.min'=>'The new password must be at least 5 characters.',
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            $notification = array(
                'message'=>'Your current password does not matches with the password you provided. Please try again.',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            $notification = array(
                'message'=>'New Password cannot be same as your current password. Please choose a different password.',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
        if($request->get('new_password') == $request->get('new_confirm_password')){
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $succss = $user->save();
            if($succss){
                Auth::logout();
                $notification = array(
                    'message'=>'Password Change Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('/')->with($notification);
            }
        }else{
            $notification = array(
                'message'=>'New password and Confirm password does not match. Plesse try again.',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }


    //create Profile
    public function createProfile()
    {
        return view('auth.createProfile');
    }

    //change Profile
    public function changeProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.changeProfile', compact('user'));
    }
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        $oldPhoto = $user->photo;
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'DOB'=>$request->DOB,
            'mertal_satus'=>$request->mertal_satus,
            'nationality'=>$request->nationality,
            'status'=>$request->status,
            'parmanent_address'=>$request->parmanent_address,
            'present_address'=>$request->present_address,
        ];
        $photo = $request->file('photo');
        
        if($photo){
            @unlink($oldPhoto);
            $img_name = Auth::user()->name;
            $ext = $photo->getClientOriginalExtension();
            $img_full_name = $img_name.".".$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $photo->move($img_path,$img_full_name);
            $data['photo']=$img_url;

            $succss = DB::table('users')->where('id', $id)->update($data);
            if($succss){
                $notification = array(
                    'message'=>'Profile Update Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('create.profile')->with($notification);
            }
        }else{
            $succss = DB::table('users')->where('id', $id)->update($data);
            $notification = array(
                'message'=>'Profile Update Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->route('create.profile')->with($notification);
        }
    }
}
