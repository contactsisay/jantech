@extends('layouts.hr_layout')

@section('module_content')

    <h2>Locations List</h2>
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

    <a href="{{ url('locations/create') }}" class="btn btn-sm btn-info">Add new Location</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>LOCATION NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/sub_locations/index',$item->id) }}" type="button" class="btn btn-flat btn-md btn-dark">Manage Sub Locations</a>
                        <a href="{{ url('/locations/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/locations/edit',$item->id) }}" type="button" class="btn btn-flat btn-md btn-warning">Edit</a>
                        <a href="{{ url('/locations/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
          <th>#</th>
          <th>LOCATION NAME</th>
          <th>DESCRIPTION</th>
          <th>ACTION</th>
      </tr>
    </tfoot>
</table>

@endsection