<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType;

class LeaveTypeController extends Controller
{
    public function index(){
        $leave_types = LeaveType::all();
        return view('leave_types.index', compact('leave_types'));
    }
    
    public function detail($id){
        $leave_type = LeaveType::findOrFail($id);
        return view('leave_types.detail', compact('leave_type'));
    }

    public function create(){
        return view('leave_types.create');
    }

    public function createPost(Request $request){
        $leave_type = new LeaveType();
        $leave_type->name = $request->name;
        $leave_type->allowed_days = $request->allowed_days;
        $leave_type->is_annual = $request->is_annual == "on" ? 1 : 0;
        $leave_type->does_offday_count = $request->does_offday_count == "on" ? 1 : 0;

        $old_item = LeaveType::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $leave_type->save();
            return redirect('/leave_types')->with('success','Leave Type created successfully');
        }else{            
            return back()->with('error','Leave Type is not created! Name is already added');
        }
    }

    public function edit($id){
        $leave_type = LeaveType::findOrFail($id);
        return view('leave_types.edit', compact('leave_type'));
    }

    public function editPost(Request $request){
        $leave_type = LeaveType::find($request->id);
        $leave_type->name = $request->name;
        $leave_type->allowed_days = $request->allowed_days;
        $leave_type->is_annual = $request->is_annual;
        $leave_type->does_offday_count = $request->does_offday_count;

        $pass = $leave_type->save();
        if($pass > 0){
            return redirect('/leave_types')->with('success','Leave Type updated successfully');
        }else{            
            return back()->with('error','Leave Type is not updated!');
        }
    }

    public function delete($id){
        $leave_type = LeaveType::findOrFail($id);
        return view('leave_types.delete', compact('leave_type'));
    }

    public function deletePost(Request $request){
        $pass = LeaveType::find($request->id)->delete();
        
        if($pass > 0){
            return redirect('/leave_types')->with('success','Leave Type deleted successfully');
        }else{            
            return back()->with('error','Leave Type is not deleted!');
        }
    }
}
