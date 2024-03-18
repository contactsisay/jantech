@extends('layouts.hr_layout')

@section('module_content')

    <h2>Create Page</h2>

    <form action="{{ url('/leave_types/createPost') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label>Name:</label><br/>
                <input type="text" name="name" class="form-control" required/>
            </div>
            <div class="col-md-3">
                <label>Allowed Days:</label><br/>
                <input type="text" placeholder="Empty means not applicable" name="allowed_days" class="form-control" required/>
            </div>
            <div class="col-md-6" style='padding-top:35px;'>
                <input type="checkbox" name="is_annual"/>&nbsp;&nbsp;<label>Is Annual?:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="does_offday_count"/>&nbsp;&nbsp;<label>Does Offday Count?:</label>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/leave_types')}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    

@endsection