@extends('layouts.hr_layout')

@section('module_content')

    <h2>Create Page</h2>

    <form action="{{ url('/employee_attendances/createPost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="hidden" value="{{ $employee->id }}" name="employee_id" />
                <label>Employee:</label><br/>
                <input type="text" disabled="disabled" name="employee_name" value="{{$employee->first_name.' '.$employee->middle_name}}" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label>Attendance Date:</label><br/>
                <input type="date" name="attendance_date" class="form-control" value="<?php echo date('Y-m-d') ?>"/>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-3">
                <label>Start:</label><br/>
                <input type="time" name="start" class="form-control" required/>
            </div>
            <div class="col-md-3">
                <label>Start Break:</label><br/>
                <input type="time" name="start_break" class="form-control" required/>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-3">
                <label>End Break:</label><br/>
                <input type="time" name="end_break" class="form-control" required/>
            </div>
            <div class="col-md-3">
                <label>End:</label><br/>
                <input type="time" name="end" class="form-control" required/>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/employee_attendances/index',$employee->id)}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    

@endsection