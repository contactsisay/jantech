@extends('layouts.hr_layout')

@section('module_content')

    <h2>Detail Page</h2>

    <div class="row">
        <div class="col-md-4">
            <label>Name:</label><br/>
            <input type="hidden" value="{{ $location->id }}" name="id" />
            <input type="text" disabled="disabled" name="name" value="{{ $location->name }}" class="form-control" required/>
        </div>
    </div>
    <div style="height:10px;">&nbsp;</div>
    <div class="row">
        <div class="col-md-4">
            <label>Description:</label><br/>
            <textarea name="description" disabled="disabled" class="form-control" rows="5" cols="50">{{ $location->description }}</textarea>
        </div>
    </div>
    <div style="height:10px;">&nbsp;</div>
    <div class="row">
        <div class="col-md-4">
            <label></label><br/>
            <a href="{{ url('/locations/edit',$location->id) }}" type="button" class="btn btn-flat  btn-sm btn-warning">Edit</a>
            <a href="{{ url('/locations')}}" class="btn btn-md btn-flat btn-danger">Back</a>
        </div>
    </div>

@endsection