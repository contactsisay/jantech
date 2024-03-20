<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\LeaveType;
use App\Models\EmployeeLeaveBalance;
use App\Models\Common;
use Carbon\Carbon;
use Auth;

class EmployeeLeaveController extends Controller
{    
    public function index($id){
        $employee = Employee::findOrFail($id);
        $employee_leaves = EmployeeLeave::where('employee_id','=',$id)->get();

        return view('employee_leaves.index', compact(['employee_leaves','employee']));
    }
    
    public function detail($id){
        $employee_leave = EmployeeLeave::findOrFail($id);
        return view('employee_leaves.detail', compact('employee_leave'));
    }

    public function create($id){
        $employee = Employee::findOrFail($id);
        $leave_types = LeaveType::all();

        $employment_year = date('Y', strtotime($employee->employment_date));
        $this_year = date('Y');
        $all_years = $this_year-$employment_year;
        $from_year = array();
        for($i=$employment_year;$i<=($employment_year+$all_years);$i++){
            $employee_leave_balances = EmployeeLeaveBalance::where('employee_id',$id)->where('year',$i)->get();
            if(count($employee_leave_balances) > 0)
            {
                if($employee_leave_balances[0]->left_balance > 0)
                    $from_year[] = $i." (Bal: ".$employee_leave_balances[0]->left_balance.")";
            }
        }
        
        return view('employee_leaves.create', compact(['employee','leave_types','from_year']));
    }

    public function createPost(Request $request){
        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->leave_type_id = $request->leave_type_id;
        $fr_raw = $request->from_year;
        $tokens = explode('(',$fr_raw);
        $employee_leave->from_year = $tokens[0];
        $given_days = (int)$request->given_days;
        $employee_leave->given_days = $given_days;
        $employee_leave->effective_date = $request->effective_date;        
        $employee_leave->given_date = $request->given_date;
        $employee_leave->updated_by = Auth::user()->id;
        $from_date = $request->effective_date;
        $return_date = Carbon::parse($from_date)->addDays($given_days);
        $employee_leave->return_date = $return_date;
        $employee_leave->file_path = $request->file_path;
        $employee_id  = $request->employee_id;
        
        $pass =  $employee_leave->save();
        
        if($pass > 0){

            //update employee leave balance 
            $employee_leave_balances = EmployeeLeaveBalance::where('employee_id',$employee_id)->where('year',$tokens[0])->get();
            if(count($employee_leave_balances) > 0)
            {
                $employee_leave_balance = $employee_leave_balances[0];
                $employee_leave_balance->year = $tokens[0];
                $employee_leave_balance->total_taken = $given_days;
                $employee_leave_balance->left_balance = $employee_leave_balance->left_balance - $given_days;
                
                $employee_leave_balance->save();
            }

            return redirect('/employee_leaves/index/'.$employee_id)->with('success','Employee Leave created successfully');
        }else{            
            return back()->with('error','Employee Leave is not created! Name is already added');
        }
    }

    public function edit($id){
        $employee_leave = EmployeeLeave::findOrFail($id);
        return view('employee_leaves.edit', compact('employee_leave'));
    }

    public function editPost(Request $request){
        $employee_leave = EmployeeLeave::find($request->id);
        $employee_leave = new EmployeeLeave();
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->leave_type_id = $request->leave_type_id;
        $fr_raw = $request->from_year;
        $tokens = explode('(',$fr_raw);
        $employee_leave->from_year = $tokens[0];
        $given_days = (int)$request->given_days;
        $employee_leave->given_days = $given_days;
        $employee_leave->effective_date = $request->effective_date;        
        $employee_leave->given_date = $request->given_date;
        $employee_leave->updated_by = Auth::user()->id;
        $from_date = $request->effective_date;
        $return_date = Carbon::parse($from_date)->addDays($given_days);
        $employee_leave->return_date = $return_date;
        $employee_leave->file_path = $request->file_path;
        $employee_id  = $request->employee_id;
        
        $pass =  $employee_leave->save();

        if($pass > 0){
            return redirect('/employee_leaves/index',$request->id)->with('success','Employee Leave updated successfully');
        }else{            
            return back()->with('error','Employee Leave is not updated!');
        }
    }

    public function delete($id){
        $employee_leave = EmployeeLeave::findOrFail($id);
        return view('employee_leaves.delete', compact('employee_leave'));
    }

    public function deletePost(Request $request){
        $pass = EmployeeLeave::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/employee_leaves')->with('success','Employee Leave deleted successfully');
        }else{            
            return back()->with('error','Employee Leave is not deleted!');
        }
    }
}
