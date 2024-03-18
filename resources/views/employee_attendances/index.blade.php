@extends('layouts.hr_layout')

@section('module_content')

    <h2>Employee Absenteeism List</h2>

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

    @if($employee != null)
      <div class="row" style="border:4px dashed #0aa">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-12"><label>SELECTED EMPLOYEE DETAILS</label></div>
          </div>
          <div class="row">
            <div class="col-3">FULL NAME: {{ $employee->first_name.' '.$employee->middle_name }}</div>
            <div class="col-3">Gender: {{ $employee->gender }}</div>
          </div>
        </div>
      </div>
    @endif

    <div class="row" style="height:10px;">
      <div class="col-12">&nbsp;</div>
    </div>

    <a href="{{ url('/employee_attendances/create',$employee->id) }}" class="btn btn-sm btn-info">Create New Absenteism</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>FULL NAME</th>
                <th>ABSENT DATE</th>
                <th>ABSENCE REASON</th>
                <th>FILE (DOCUMENT)</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee_attendances as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $employee->first_name.' '.$employee->middle_name }}</td>
                <td>{{ $item->absent_date }}</td>
                <td>{{ $item->absence_reason }}</td>
                <td>{{ $item->file_path }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/employee_attendances/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/employee_attendances/edit',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-warning">Edit</a>
                        <a href="{{ url('/employee_attendances/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>FULL NAME</th>
            <th>ABSENT DATE</th>
            <th>ABSENCE REASON</th>
            <th>FILE (DOCUMENT)</th>
            <th>ACTION</th>
        </tr>
</table>

@endsection