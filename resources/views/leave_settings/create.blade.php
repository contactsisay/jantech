@extends('layouts.hr_layout')

@section('module_content')

    <h2>Create Page</h2>

    <form action="{{ url('/leave_settings/createPost') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label>Initial Balance:</label><br/>
                <input type="text" name="initial_balance" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label>Annual Increment:</label><br/>
                <input type="text" name="annual_increment" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label></label><br/><br/>
                <input type="checkbox" name="is_managerial"/><label>&nbsp;&nbsp;Is Managerial?:</label>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/leave_settings')}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    

@endsection