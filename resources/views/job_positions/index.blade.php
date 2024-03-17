@extends('layouts.hr_layout')

@section('module_content')

    <h2>Job Positions List</h2>

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

    @if($sub_department != null)
      <div class="row" style="border:4px dashed #0aa">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-12"><label>SELECTED SUB DEPARTMENT DETAILS</label></div>
          </div>
          <div class="row">
            <div class="col-3">Name: {{ $sub_department->name }}</div>
            <div class="col-3">Description: {{ $sub_department->description }}</div>
          </div>
        </div>
      </div>
    @endif

    <div class="row" style="height:10px;">
      <div class="col-12">&nbsp;</div>
    </div>

    <a href="{{ url('/job_positions/create',$sub_department->id) }}" class="btn btn-sm btn-info">Add new Job Positions</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>JOB POSITION NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($job_positions as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/job_positions/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/job_positions/edit',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-warning">Edit</a>
                        <a href="{{ url('/job_positions/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>JOB POSITION NAME</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection