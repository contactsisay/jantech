<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeOffday;
use App\Models\Common;

class EmployeeOffdayController extends Controller
{    
    public function index($id){
        $employee = Employee::findOrFail($id);
        $employee_offdays = EmployeeOffday::where('employee_id','=',$id)->get();

        return view('employee_offdays.index', compact(['employee_offdays','employee']));
    }
    
    public function detail($id){
        $employee_offday = EmployeeOffday::findOrFail($id);
        return view('employee_offdays.detail', compact('employee_offday'));
    }

    public function create($id){
        $employee = Employee::findOrFail($id);
        $week_days = Common::getWeekDays();
        
        return view('employee_offdays.create', compact(['employee','week_days']));
    }

    public function createPost(Request $request){
        $employee_offday = new EmployeeOffday();
        $employee_offday->employee_id = $request->employee_id;
        $employee_offday->weekday = $request->weekday;
        $employee_offday->expiry_date = $request->expiry_date;
        $employee_id  = $request->employee_id;

        $pass =  $employee_offday->save();
        
        if($pass > 0){
            return redirect('/employee_offdays/index/'.$employee_id)->with('success','Employee Offday created successfully');
        }else{            
            return back()->with('error','Employee Offday is not created! Name is already added');
        }
    }

    public function edit($id){
        $employee_offday = EmployeeOffday::findOrFail($id);
        return view('employee_offdays.edit', compact('employee_offday'));
    }

    public function editPost(Request $request){
        $employee_offday = EmployeeLeave::find($request->id);
        $employee_offday->employee_id = $request->employee_id;
        $employee_offday->weekday = $request->weekday;
        $employee_offday->expiry_date = $request->expiry_date;
        $employee_id  = $request->employee_id;

        $pass =  $employee_offday->save();

        if($pass > 0){
            return redirect('/employee_offdays/index',$request->id)->with('success','Employee Offday updated successfully');
        }else{            
            return back()->with('error','Employee Offday is not updated!');
        }
    }

    public function delete($id){
        $employee_offday = EmployeeOffday::findOrFail($id);
        return view('employee_offdays.delete', compact('employee_offday'));
    }

    public function deletePost(Request $request){
        $pass = EmployeeOffday::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/employee_offdays')->with('success','Employee Offday deleted successfully');
        }else{            
            return back()->with('error','Employee Offday is not deleted!');
        }
    }
}
