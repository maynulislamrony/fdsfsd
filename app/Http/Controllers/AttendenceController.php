<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class AttendenceController extends Controller
{
    public function takenAttendence()
    {
        $employee = Employee::select('name', 'photo', 'id')->get();
        return view('attendence.takenAttendence', compact('employee'));
    }
//Store Attendence
    public function storeAttendence(Request $request)
    {
        $request->validate([
            'attendence'=>'required',
        ]);
        $date = $request->date;
        $check = DB::table('attendences')->where('date',$date)->first();
        if($check){
                $notification = array(
                    'message'=>'Attendence Already Taken',
                    'alert-type'=>'error',
                );
                return redirect()->back()->with($notification);
            }
        else{
            foreach($request->emp_id as $id)
            {
                $data[] = [
                    'emp_id'=>$id,
                    'attendence'=>$request->attendence[$id],
                    'date'=>$request->date,
                    'month'=>$request->month
                ];
            }
            $attendence = DB::table('attendences')->insert($data);
            try{
                if($attendence){
                    $notification = array(
                        'message'=>'Successfully Attendence Taken',
                        'alert-type'=>'success',
                    );
                    return redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                return redirect()->back();
            }
        }   
    }
//All Attendenc Show
    public function allAttendence()
    {  
        $attendence = DB::table('attendences')->select('date')->groupBy('date')->get();
        return view('attendence.allAtttendence', compact('attendence'));
    }
// Edit Attendence
    public function editAttendence($date)
    {
        $employee = DB::table('attendences')
                    ->join('employees', 'attendences.emp_id', 'employees.id')
                    ->select('employees.name', 'employees.photo', 'attendences.*')
                    ->where('date',$date)
                    ->get();
        return view('attendence.editAttendence',compact('employee'));
    }
// Attendence Update
    public function updateAttendence(Request $request)
    {
        foreach($request->id as $id)
            {
                $data = [
                    'attendence'=>$request->attendence[$id],
                    'date'=>$request->date,
                    'month'=>$request->month
                ];
                $updateAttendence = Attendence::where(['date'=>$request->date,'id'=>$id])->first();
                $update = $updateAttendence->update($data);
            }
        if($update)
            {
                $notification = array(
                    'message'=>'Successfully Attendence Update',
                    'alert-type'=>'success',
                );
                return redirect()->route('all.attendence')->with($notification);
            }
    }
//Delete Attendence
    public function deleteAttendence(Request $request)
    {
        $deleteAttendence = Attendence::where('date', $request->id)->get();
        foreach($deleteAttendence as $delete)
        {
            $deletedata = $delete->delete();
        }
        if($deletedata)
        {
            $notification = array(
                'message'=>'Delete Attendence',
                'alert-type'=>'success',
            );
            return redirect()->back()->with($notification);
        }
    }
//View Attendence
    public function viewAttendence($date)
    {
        $view = DB::table('attendences')
                    ->join('employees', 'attendences.emp_id', 'employees.id')
                    ->select('employees.name', 'employees.photo', 'attendences.*')
                    ->where('date',$date)
                    ->get();
        return view('attendence.viewAttendence',compact('view'));
    }

    public function monthlyAttendence()
    {
        $month = date('F');
        $viewMonth = DB::table('attendences')
                    ->join('employees', 'attendences.emp_id', 'employees.id')
                    ->select('employees.name', 'employees.photo', 'attendences.*')
                    ->where('month',$month)
                    ->get();
        return view('attendence.monthlyAttendence',compact('viewMonth'));
    }
}
