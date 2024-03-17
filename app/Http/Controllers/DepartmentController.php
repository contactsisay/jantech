<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\SubLocation;

class DepartmentController extends Controller
{    
    public function index($id){
        $sub_location = SubLocation::findOrFail($id);
        $departments = Department::where('sub_location_id','=',$id)->get();
        return view('departments.index', compact(['departments','sub_location']));
    }
    
    public function detail($id){
        $department = Department::findOrFail($id);
        return view('departments.detail', compact('department'));
    }

    public function create($id){
        $sub_location = SubLocation::findOrFail($id);
        return view('departments.create', compact('sub_location'));
    }

    public function createPost(Request $request){
        $department = new Department();
        $department->name = $request->name;
        $department->sub_location_id = $request->sub_location_id;
        $department->description = $request->description;
        $sub_location_id = $request->sub_location_id;

        $old_item = Department::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $department->save();
            return redirect('/departments/index/'.$sub_location_id)->with('success','Department created successfully');
        }else{            
            return back()->with('error','Department is not created! Name is already added');
        }
    }

    public function edit($id){
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function editPost(Request $request){
        $department = Department::find($request->id);
        $department->name = $request->name;
        $department->sub_location_id = $request->sub_location_id;
        $department->description = $request->description;
        $sub_location_id = $request->sub_location_id;

        $pass = $department->save();
        if($pass > 0){
            return redirect('/departments/index/'.$sub_location_id)->with('success','Department updated successfully');
        }else{            
            return back()->with('error','Department is not updated!');
        }
    }

    public function delete($id){
        $department = Department::findOrFail($id);
        return view('departments.delete', compact('department'));
    }

    public function deletePost(Request $request){
        $pass = Department::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/departments/index/'.$request->sub_location_id)->with('success','Department deleted successfully');
        }else{            
            return back()->with('error','Department is not deleted!');
        }
    }
}
