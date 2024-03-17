<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveSetting;

class LeaveSettingController extends Controller
{
    public function index(){
        $leave_settings = LeaveSetting::all();
        return view('leave_settings.index', compact('leave_settings'));
    }
    
    public function detail($id){
        $leave_setting = LeaveSetting::findOrFail($id);
        return view('leave_settings.detail', compact('leave_setting'));
    }

    public function create(){
        return view('leave_settings.create');
    }

    public function createPost(Request $request){
        $leave_setting = new LeaveSetting();
        $leave_setting->is_managerial = $request->is_managerial == "on" ? 1 : 0;
        $leave_setting->initial_balance = $request->initial_balance;
        $leave_setting->annual_increment = $request->annual_increment;

        $pass = $leave_setting->save();
        
        if($pass > 0){
            return redirect('/leave_settings')->with('success','Leave Setting created successfully');
        }else{            
            return back()->with('error','Leave Setting is not created! Name is already added');
        }
    }

    public function edit($id){
        $leave_setting = LeaveSetting::findOrFail($id);
        return view('leave_settings.edit', compact('leave_setting'));
    }

    public function editPost(Request $request){
        $leave_setting = LeaveSetting::find($request->id);
        $leave_setting->is_managerial = $request->is_managerial == "on" ? 1 : 0;
        $leave_setting->initial_balance = $request->initial_balance;
        $leave_setting->annual_increment = $request->annual_increment;

        $pass = $leave_setting->save();
        if($pass > 0){
            return redirect('/leave_settings')->with('success','Leave Setting updated successfully');
        }else{            
            return back()->with('error','Leave Setting is not updated!');
        }
    }

    public function delete($id){
        $leave_setting = LeaveSetting::findOrFail($id);
        return view('leave_settings.delete', compact('leave_setting'));
    }

    public function deletePost(Request $request){
        $pass = LeaveSetting::find($request->id)->delete();
        
        if($pass > 0){
            return redirect('/leave_settings')->with('success','Leave Setting deleted successfully');
        }else{            
            return back()->with('error','Leave Setting is not deleted!');
        }
    }
}
