@extends('layouts.hr_layout')

@section('module_content')

    <h2>Leave Settings List</h2>
    
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

    <a href="{{ url('leave_settings/create') }}" class="btn btn-sm btn-info">Add new Leave Setting</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>INITIAL BALANCE</th>
                <th>ANNUAL INCREMENT</th>
                <th>IS MANAGERIAL?</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leave_settings as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->initial_balance }}</td>
                <td>{{ $item->annual_increment }}</td>
                <td>{{ ($item->is_managerial == 0 ? "NO" : "YES") }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/leave_settings/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/leave_settings/edit',$item->id) }}" type="button" class="btn btn-flat btn-md btn-warning">Edit</a>
                        <a href="{{ url('/leave_settings/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>INITIAL BALANCE</th>
            <th>ANNUAL INCREMENT</th>
            <th>IS MANAGERIAL?</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection