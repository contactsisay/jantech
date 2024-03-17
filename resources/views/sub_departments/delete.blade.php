@extends('layouts.hr_layout')

@section('module_content')

    <h2>Delete Page</h2>

    <div class="row">
        <div class="col-md-4">
            <label>Name:</label><br/>
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
            <form action="{{ url('/locations/deletePost') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $location->id }}"/>
                <input type="submit" class="btn btn-flat btn-md btn-danger" value="Delete" />&nbsp;&nbsp;
                <a href="{{ url('/locations')}}" class="btn btn-md btn-flat btn-info">Back</a>
            </form>
            
        </div>
    </div>

@endsection