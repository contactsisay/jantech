<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Location;
use App\Models\SubLocation;
use App\Models\Department;
use App\Models\SubDepartment;
use App\Models\JobPosition;

class EmployeeController extends Controller
{    
    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }
    
    public function detail($id){
        $employee = Employee::findOrFail($id);
        return view('employees.detail', compact('employee'));
    }

    public function create(){
        $locations = Location::all();
        return view('employees.create', compact('locations'));
    }

    public function createPost(Request $request){
        $employee = new Employee();
        $employee->job_position_id = $request->job_position_id;
        $employee->code = $request->code;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->employment_date = $request->employment_date;
        $employee->mobile_no = $request->mobile_no;
        $employee->address = $request->address;

        $old_item = Employee::where('code','=',$request->code)->get();
        
        if(count($old_item) <= 0){
            //create if there is no record
            $employee->save();
            return redirect('/employees')->with('success','Employee created successfully');
        }else{            
            return back()->with('error','Employee is not created! Name is already added');
        }
    }

    public function edit($id){
        $sub_department = SubDepartment::findOrFail($id);
        return view('sub_departments.edit', compact('sub_department'));
    }

    public function editPost(Request $request){
        $employee = Employee::findOrFail($request->id);
        $employee->job_position_id = $request->job_position_id;
        $employee->code = $request->code;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->employment_date = $request->employment_date;
        $employee->mobile_no = $request->mobile_no;
        $employee->address = $request->address;
        
        $pass = $employee->save();
        if($pass > 0){
            return redirect('/employees')->with('success','Employee data is updated successfully');
        }else{            
            return back()->with('error','Employee data is not updated!');
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

    public function fetchSubLocations($id) {
        $sublocations = SubLocation::where('location_id', $id)->get();
        return json_encode($sublocations);
    }

    public function fetchDepartments($id) {
        $departments = Department::where('sub_location_id', $id)->get();
        return json_encode($departments);
    }

    public function fetchSubDepartments($id) {
        $sub_departments = SubDepartment::where('department_id', $id)->get();
        return json_encode($sub_departments);
    }

    public function fetchJobPositions($id) {
        $job_positions = JobPosition::where('sub_department_id', $id)->get();
        return json_encode($job_positions);
    }
}
