@extends('layouts.hr_layout')

@section('module_content')

    <h2>Create Page</h2>

    <form action="{{ url('/employee_leaves/createPost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="hidden" value="{{ $employee->id }}" name="employee_id" />
                <label>Employee:</label><br/>
                <input type="text" disabled="disabled" name="employee_name" value="{{$employee->first_name.' '.$employee->middle_name}}" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label>Leave Type:</label><br/>
                <select name="leave_type_id" class="form-control">
                    <option value="0" selected >Select Leave Type</option>
                    @foreach($leave_types as $leave_type)
                        <option value="{{ $leave_type->id }}">{{ $leave_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>From Year (Balance):</label><br/>
                <select name="from_year" class="form-control">
                    @foreach($from_year as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label>Given Days:</label><br/>
                <input type="text" name="given_days" class="form-control" required/>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>

        <div class="row">
            <div class="col-md-3">
                <label>Effective Date:</label><br/>
                <input type="date" name="effective_date" class="form-control" required/>
            </div>
            <div class="col-lg-3">
                <label>Given Date:</label><br/>
                <input type="date" name="given_date" class="form-control" value="{{ date('Y-m-d') }}" required/>
            </div>
            <div class="col-lg-3">
                <label>Attach Document (if any):</label><br/>
                <input type="file" name="file_path" class="form-control"/>
            </div>
            <!--<div class="col-lg-3">
                <label>Return Date:</label><br/>
                <input type="date" name="return_date" class="form-control"/>
            </div>-->
        </div>

        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/employee_leaves/index',$employee->id)}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    

@endsection