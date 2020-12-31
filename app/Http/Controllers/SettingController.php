<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Throwable;

class SettingController extends Controller
{
    public function setting()
    {

        return view('setting.setting',[
            'viewSetting'=>Setting::first(),
        ]);
    }

    public function storeSetting(Request $request, $id)
    {
        $setting = Setting::find($id);
        $photo = $setting->company_photo;
        $data = [
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'company_phone'=>$request->company_phone,
            'company_mobile'=>$request->company_mobile,
            'company_city'=>$request->company_city,
            'company_country'=>$request->company_country,
            'company_zipcode'=>$request->company_zipcode,
            'company_address'=>$request->company_address,
        ];
        $img =$request-> file('company_photo');
        if($img){
            @unlink($photo);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;
            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['company_photo']=$img_url;
            $success = $setting->update($data);
            try{
                if($success){
                    $notification = array(
                        'message'=>'Store information update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }  
        }else{
            try{
                $success = $setting->update($data);
                if($success){
                    $notification = array(
                        'message'=>'Store information update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
}
