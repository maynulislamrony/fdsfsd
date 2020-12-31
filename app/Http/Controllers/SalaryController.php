<?php

namespace App\Http\Controllers;

use App\Models\AdvanceSalary;
use App\Models\Employee;
use App\Models\PaySalary;
use Illuminate\Http\Request;
use Throwable;

class SalaryController extends Controller
{
    public function create_advance_salary()
    {
        $employee = Employee::select('name', 'id')->get();
        return view('salary.createAdvance', compact('employee'));
    }

    public function storeAdvanceSalary(Request $request)
    {
        $request->validate([
            'employee_id'=>'required',
            'month'=>'required',
            'year'=>'required|numeric',
            'advance_salary'=>'required|numeric',
        ],[
            'employee_id.required'=>'Employee field not selected.',
            'month.required'=>'Month field not selected.',
            'year.required'=>'Year field is empty.',
            'advance_salary.required'=>'Advance salary field is empty.',
        ]);
        $data = [
            'employee_id'=>$request->employee_id,
            'month'=>$request->month,
            'year'=>$request->year,
            'advance_salary'=>$request->advance_salary,
        ];

        $check = AdvanceSalary::where(['employee_id'=>$request->employee_id,'month'=>$request->month,'year'=>$request->year])->first();
        if($check)
        {
            $notification = array(
                'message'=>'Already Advance Pay !',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }else{
            $success = AdvanceSalary::insert($data);
            try{
                if($success){
                    $notification = array(
                        'message'=>'Advance Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function allAdvanceSalary()
    {
        $advance = AdvanceSalary::with('employee')->orderBy('id','desc')->get();
        return view('salary.allAdvanceSalary', compact('advance'));
    }

    public function editAdvanceSalary($id)
    {
        $employee = Employee::select('name', 'id')->get();
        $advance = AdvanceSalary::where('id',$id)->first();
        return view('salary.editAdvanceSalary', compact('employee', 'advance'));
    }

    public function updateAdvanceSalary(Request $request, $id)
    {
        $update = AdvanceSalary::find($id);
        $data = [
            'employee_id'=>$request->employee_id,
            'month'=>$request->month,
            'year'=>$request->year,
            'advance_salary'=>$request->advance_salary,
        ];
        $success = $update->update($data);
        try{
            if($success){
                $notification = array(
                    'message'=>'Update Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('all.advanceSalary')->with($notification);
            }
        }catch(Throwable $exception){
            $notification = array(
                'message'=>'Something is Wrong !!',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        $success = AdvanceSalary::find($request->id)->delete();
        if($success){
            $notification = array(
                'message'=>'Delete Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->route('all.advanceSalary')->with($notification);
        }else{
            $notification = array(
                'message'=>'Something is worng!',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function paySalary()
    {
        $employee = Employee::all();
        return view('salary.paySalary', compact('employee'));
    }

    public function paySalarySuccess(Request $request)
    {
        $request->validate([
            'payment_type'=>'required',
        ]);
        $employee = Employee::find($request->id);
        $advance = AdvanceSalary::where('employee_id',$request->id)->select('advance_salary')->first();
        
        $data = [
            'employee_id'=>$employee->id,
            'month'=>$request->month,
            'payment_type'=>$request->payment_type,
            'status'=>"Paid",
        ];
        if($advance){
            $data['advance_salary']=$advance->advance_salary;
        }else{
            $data['advance_salary'] = "0";
        }
        if($advance){
            $data['net_salary']=$employee->salary-$advance->advance_salary;
        }else{
            $data['net_salary'] = $employee->salary;
        }

        $check = PaySalary::where('employee_id', $request->id)->first();
        if($check){
            $notification = array(
                'message'=>'Already Pay !',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }else{
            $success = PaySalary::insert($data);
            try{
                if($success){
                    $notification = array(
                        'message'=>'Payment Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function lastmonthSalary()
    {
        $month = date("F",strtotime('-1 month'));
        $lastMonthSalary = PaySalary::with('employee')->where('month',$month)->get();
        return view('salary.lastmonthSalary', compact('lastMonthSalary'));
    }
}
