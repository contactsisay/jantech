@extends('layouts.hr_layout')

@section('module_content')

    <h2>Employee Leaves List</h2>

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

    <a href="{{ url('/employee_leaves/create',$employee->id) }}" class="btn btn-sm btn-info">Grant New Leave</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('/employee_leave_balances/index',$employee->id) }}" class="btn btn-sm btn-outline-info">VIEW LEAVE BALANCE</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>FULL NAME</th>
                <th>LEAVE TYPE</th>
                <th>FROM YEAR</th>
                <th>GIVEN DAYS</th>
                <th>GIVEN DATE</th>
                <th>EFFECTIVE DATE</th>
                <th>RETURN DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee_leaves as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $employee->first_name.' '.$employee->middle_name }}</td>
                <td>{{ $item->leave_type_id }}</td>
                <td>{{ $item->from_year }}</td>
                <td>{{ $item->given_days }}</td>
                <td>{{ App\Models\Common::formatDate($item->given_date) }}</td>
                <td>{{ App\Models\Common::formatDate($item->effective_date) }}</td>
                <td>{{ App\Models\Common::formatDate($item->return_date) }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/employee_leaves/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/employee_leaves/edit',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-warning">Edit</a>
                        <a href="{{ url('/employee_leaves/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach
        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>FULL NAME</th>
            <th>LEAVE TYPE</th>
            <th>FROM YEAR</th>
            <th>GIVEN DAYS</th>
            <th>GIVEN DATE</th>
            <th>EFFECTIVE DATE</th>
            <th>RETURN DATE</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection