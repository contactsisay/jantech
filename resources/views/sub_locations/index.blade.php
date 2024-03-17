@extends('layouts.hr_layout')

@section('module_content')

    <h2>Sub Locations List</h2>

    @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif
    @if(Session::has('error'))
      <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
      </div>
    @endif

    @if($location != null)
      <div class="row" style="border:4px dashed #0aa">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-12"><label>SELECTED LOCATION DETAILS</label></div>
          </div>
          <div class="row">
            <div class="col-3">Name: {{ $location->name }}</div>
            <div class="col-3">Description: {{ $location->description }}</div>
          </div>
        </div>
      </div>
    @endif

    <div class="row" style="height:10px;">
      <div class="col-12">&nbsp;</div>
    </div>

    <a href="{{ url('/sub_locations/create',$location->id) }}" class="btn btn-sm btn-info">Add new Sub Location</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>SUB LOCATION NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sub_locations as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/departments/index',$item->id) }}" type="button" class="btn btn-flat btn-md btn-dark">Manage Departments</a>
                        <a href="{{ url('/sub_locations/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/sub_locations/edit',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-warning">Edit</a>
                        <a href="{{ url('/sub_locations/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>SUB LOCATION NAME</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection