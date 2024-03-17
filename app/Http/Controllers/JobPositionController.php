<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubDepartment;
use App\Models\JobPosition;

class JobPositionController extends Controller
{    
    public function index($id){
        $sub_department = SubDepartment::findOrFail($id);
        $job_positions = JobPosition::where('sub_department_id','=',$id)->get();
        return view('job_positions.index', compact(['job_positions','sub_department']));
    }
    
    public function detail($id){
        $job_position = JobPosition::findOrFail($id);
        return view('job_positions.detail', compact('job_position'));
    }

    public function create($id){
        $sub_department = SubDepartment::findOrFail($id);
        return view('job_positions.create', compact('sub_department'));
    }

    public function createPost(Request $request){
        $job_position = new JobPosition();
        $job_position->name = $request->name;
        $job_position->sub_department_id = $request->sub_department_id;
        $job_position->description = $request->description;
        $sub_department_id = $request->sub_department_id;

        $old_item = JobPosition::where('name','=',$request->name)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $job_position->save();
            return redirect('/job_positions/index/'.$sub_department_id)->with('success','Job Position created successfully');
        }else{            
            return back()->with('error','ob Position is not created! Name is already added');
        }
    }

    public function edit($id){
        $job_position = JobPosition::findOrFail($id);
        return view('job_positions.edit', compact('job_position'));
    }

    public function editPost(Request $request){
        $job_position = JobPosition::find($request->id);
        $job_position->name = $request->name;
        $job_position->sub_department_id = $request->sub_department_id;
        $job_position->description = $request->description;
        $sub_department_id = $request->sub_department_id;

        $pass = $job_position->save();
        if($pass > 0){
            return redirect('/job_positions/index/'.$department_id)->with('success','Job Position updated successfully');
        }else{            
            return back()->with('error','Job Position is not updated!');
        }
    }

    public function delete($id){
        $job_position = JobPosition::findOrFail($id);
        return view('job_positions.delete', compact('job_position'));
    }

    public function deletePost(Request $request){
        $pass = JobPosition::findOrFail($request->id)->delete();
        
        if($pass > 0){
            return redirect('/job_positions/index/'.$request->department_id)->with('success','Job Position deleted successfully');
        }else{            
            return back()->with('error','Job Position is not deleted!');
        }
    }
}
