<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class CustomerController extends Controller
{
    public function create(){
        return view('customer.create');
    }

    public function index()
    {
        $customer = Customer::select('name', 'phone', 'address', 'city', 'photo','id')->orderBy('id','desc')->get();
        return view('customer.index', compact('customer'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'shopName'=>'required',
            'city'=>'required',
            'address'=>'required',
        ],[
            'name.required'=>'Customer name field is empty.',
            'email.required'=>'Email field is empty',
            'phone.required'=>'Phone number field is empty.',
            'phone.min'=>'Phone number input maximum 11 character',
            'city.required'=>'City field is empty',
            'shopName.required'=>'Company Name field is empty',
            'address.required'=>'Address field is empty',
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'shopName'=>$request->shopName,
            'city'=>$request->city,
            'address'=>$request->address
        ];
        $img =$request-> file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $customer = Customer::create($data);
            try{
                if($customer){
                    $notification = array(
                        'message'=>'Customer Added Successfull!',
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
            $customer = Customer::create($data);
            try{
                if($customer){
                    $notification = array(
                        'message'=>'Customer Added Successfull!',
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

    public function view($id)
    {
        $viewCustomer = Customer::find($id);
        return view('customer.view', compact('viewCustomer'));
    }

    public function destroy(Request $request)
    {
        $deleteCustomer = Customer::find($request->id);
        $delete = $deleteCustomer->delete();
        if($delete){
            $notification = array(
                'message'=>'Delete Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editCustomer = Customer::find($id);
        return view('customer.edit',compact('editCustomer'));
    }
    public function update(Request $request, $id)
    {
        $updateCustomer = Customer::find($id);
        $oldphoto = $updateCustomer->photo;
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'shopName'=>$request->shopName,
            'city'=>$request->city,
            'address'=>$request->address
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateCustomer->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.customer')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->route('index.customer')->with($notification);
            }
        }else{
            $update = $updateCustomer->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.customer')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->route('index.customer')->with($notification);
            }
        }
    }
}
