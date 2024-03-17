<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SubDepartment;

class SubDepartmentController extends Controller
{    
    public function index($id){
        $department = Department::findOrFail($id);
        $sub_departments = SubDepartment::where('department_id','=',$id)->get();
        return view('sub_departments.index', compact(['sub_departments','department']));
    }
    
    public function detail($id){
        $sub_department = SubDepartment::findOrFail($id);
        return view('sub_departments.detail', compact('sub_department'));
    }

    public function create($id){
        $department = Department::findOrFail($id);
        return view('sub_departments.create', compact('department'));
    }

    public function createPost(Request $request){
        $sub_department = new SubDepartment();
        $sub_department->name = $request->name;
        $sub_department->department_id = $request->department_id;
        $sub_department->description = $request->description;
        $department_id = $request->department_id;

        $old_item = SubDepartment::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $sub_department->save();
            return redirect('/sub_departments/index/'.$department_id)->with('success','Sub Department created successfully');
        }else{            
            return back()->with('error','Sub Department is not created! Name is already added');
        }
    }

    public function edit($id){
        $sub_department = SubDepartment::findOrFail($id);
        return view('sub_departments.edit', compact('sub_department'));
    }

    public function editPost(Request $request){
        $sub_department = SubDepartment::find($request->id);
        $sub_department->name = $request->name;
        $sub_department->department_id = $request->department_id;
        $sub_department->description = $request->description;
        $department_id = $request->department_id;

        $pass = $sub_department->save();
        if($pass > 0){
            return redirect('/sub_departments/index/'.$department_id)->with('success','Sub Department updated successfully');
        }else{            
            return back()->with('error','Sub Department is not updated!');
        }
    }

    public function delete($id){
        $sub_department = SubDepartment::findOrFail($id);
        return view('sub_departments.delete', compact('sub_department'));
    }

    public function deletePost(Request $request){
        $pass = SubDepartment::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/sub_departments/index/'.$request->department_id)->with('success','Sub Department deleted successfully');
        }else{            
            return back()->with('error','Sub Department is not deleted!');
        }
    }
}
