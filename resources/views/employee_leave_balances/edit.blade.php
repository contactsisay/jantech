@extends('layouts.hr_layout')

@section('module_content')

    <h2>Edit Page</h2>
    
    <form action="{{ url('/locations/editPost') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label>Name:</label><br/>
                <input type="hidden" value="{{ $sub_location->id }}" name="id" />
                <input type="text" name="name" value="{{ $sub_location->name }}" class="form-control" required/>
            </div>
            <div class="col-md-4">
                <label>Location:</label><br/>
                <input type="hidden" value="{{ $location->id }}" name="location_id" />
                <input type="text" disabled="disabled" value="{{$location->name}}" class="form-control" />
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label>Description:</label><br/>
                <textarea name="description" class="form-control" rows="5" cols="50">{{ $sub_location->description }}</textarea>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save Changes" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/sub_locations')}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
    

@endsection