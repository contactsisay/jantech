<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\Common;

class EmployeeAttendanceController extends Controller
{    
    public function index($id){
        $employee = Employee::findOrFail($id);
        $employee_attendances = EmployeeAttendance::where('employee_id','=',$id)->get();

        return view('employee_attendances.index', compact(['employee_attendances','employee']));
    }
    
    public function detail($id){
        $employee_attendance = EmployeeAttendance::findOrFail($id);
        return view('employee_attendances.detail', compact('employee_attendance'));
    }

    public function create($id){
        $employee = Employee::findOrFail($id);
        
        return view('employee_attendances.create', compact(['employee']));
    }

    public function createPost(Request $request){
        $employee_attendance = new EmployeeAttendance();
        $employee_attendance->employee_id = $request->employee_id;
        $employee_attendance->absent_date = $request->absent_date;
        $employee_attendance->absence_reason = $request->absence_reason;
        $employee_attendance->file_path = $request->file_path;
        $employee_id  = $request->employee_id;

        $pass =  $employee_attendance->save();
        
        if($pass > 0){
            return redirect('/employee_attendances/index/'.$employee_id)->with('success','Employee Attendance created successfully');
        }else{            
            return back()->with('error','Employee Attendance is not created!');
        }
    }

    public function edit($id){
        $employee_attendance = EmployeeAttendance::findOrFail($id);
        return view('employee_attendances.edit', compact('employee_attendance'));
    }

    public function editPost(Request $request){
        $employee_attendance = EmployeeLeave::find($request->id);
        $employee_attendance->employee_id = $request->employee_id;
        $employee_attendance->absent_date = $request->absent_date;
        $employee_attendance->absence_reason = $request->absence_reason;
        $employee_attendance->file_path = $request->file_path;
        $employee_id  = $request->employee_id;

        $pass =  $employee_attendance->save();

        if($pass > 0){
            return redirect('/employee_attendances/index',$request->id)->with('success','Employee Attendance updated successfully');
        }else{            
            return back()->with('error','Employee Attendance is not updated!');
        }
    }

    public function delete($id){
        $employee_attendance = EmployeeAttendance::findOrFail($id);
        return view('employee_attendances.delete', compact('employee_attendance'));
    }

    public function deletePost(Request $request){
        $pass = EmployeeAttendance::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/employee_attendances')->with('success','Employee Attendance deleted successfully');
        }else{            
            return back()->with('error','Employee Attendance is not deleted!');
        }
    }
}
