<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeLeaveBalance;
use App\Models\EmployeeLeave;
use App\Models\Common;

class EmployeeLeaveBalanceController extends Controller
{    
    public function index($id){
        $employee = Employee::findOrFail($id);
        $employee_leave_balances = EmployeeLeaveBalance::where('employee_id','=',$id)->get();
               
        return view('employee_leave_balances.index', compact(['employee_leave_balances','employee']));
    }
    
    public function detail($id){
        $employee_leave_balance = EmployeeLeaveBalance::findOrFail($id);
        return view('employee_leave_balances.detail', compact('employee_leave_balance'));
    }

    public function create($id){
        $employee = Employee::findOrFail($id);
        return view('employee_leave_balances.create', compact('employee'));
    }

    public function createPost(Request $request){
        $employee_leave_balance = new EmployeeLeaveBalance();
        $employee_leave_balance->employee_id = $request->employee_id;
        $employee_leave_balance->year = $request->year;
        $employee_leave_balance->initial_balance = $request->initial_balance;
        $employee_leave_balance->total_taken = $request->total_taken;
        $employee_leave_balance->left_balance = $request->left_balance;        
        $employee_leave_balance->expiry_date = $request->expiry_date;
        $employee_id = $request->employee_id;
       
        $pass =  $employee_leave_balance->save();
        
        if($pass > 0){
            return redirect('/employee_leave_balances/index',$employee_id)->with('success','Employee Leave Balance created successfully');
        }else{            
            return back()->with('error','Employee Leave Balance is not created! Name is already added');
        }
    }

    public function edit($id){
        $employee_leave_balance = EmployeeLeaveBalance::findOrFail($id);
        return view('employee_leave_balances.edit', compact('employee_leave_balance'));
    }

    public function editPost(Request $request){
        $employee_leave = EmployeeLeaveBalance::find($request->id);
        $employee_leave->employee_id = $request->employee_id;
        $employee_leave->year = $request->year;
        $employee_leave->initial_balance = $request->initial_balance;
        $employee_leave->total_taken = $request->total_taken;
        $employee_leave->left_balance = $request->left_balance;        
        $employee_leave->expiry_date = $request->expiry_date;

        $pass =  $employee_leave_balance->save();

        if($pass > 0){
            return redirect('/employee_leave_balances/index',$request->id)->with('success','Employee Leave updated successfully');
        }else{            
            return back()->with('error','Employee Leave Balance is not updated!');
        }
    }

    public function delete($id){
        $employee_leave_balance = EmployeeLeaveBalance::findOrFail($id);
        return view('employee_leaves.delete', compact('employee_leave_balance'));
    }

    public function deletePost(Request $request){
        $pass = EmployeeLeaveBalance::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/employees')->with('success','Employee Leave Balance deleted successfully');
        }else{            
            return back()->with('error','Employee Leave Balance is not deleted!');
        }
    }
    
}
