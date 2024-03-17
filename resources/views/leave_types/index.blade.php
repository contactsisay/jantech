@extends('layouts.hr_layout')

@section('module_content')

    <h2>Leave Types List</h2>
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

    <a href="{{ url('leave_types/create') }}" class="btn btn-sm btn-info">Add new Leave Type</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th>ALLOWED DAYS</th>
                <th>IS ANNUAL?</th>
                <th>DOES OFFDAY COUNT?</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leave_types as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->allowed_days }}</td>
                <td>{{ $item->is_annual == 0 ? "NO" : "YES" }}</td>
                <td>{{ $item->does_offday_count == 0 ? "NO" : "YES" }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/leave_types/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/leave_types/edit',$item->id) }}" type="button" class="btn btn-flat btn-md btn-warning">Edit</a>
                        <a href="{{ url('/leave_types/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>NAME</th>
            <th>ALLOWED DAYS</th>
            <th>IS ANNUAL?</th>
            <th>DOES OFFDAY COUNT?</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection