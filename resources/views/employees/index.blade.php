@extends('layouts.hr_layout')

@section('module_content')

    <h2>Employees List</h2>

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

    <div class="row" style="height:10px;">
      <div class="col-12">&nbsp;</div>
    </div>

    <a href="{{ url('/employees/create') }}" class="btn btn-sm btn-info">Add new Employee</a>
    <div style="height:10px;">&nbsp;</div>
    
    <table id="example1" class="table table-sm table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>LAST NAME</th>
                <th>GENDER</th>
                <th>JOB POSITION</th>
                <th>EMPLOYMENT DATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $item)
            <tr>
                <td>{{ $loop->iteration }} </td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->middle_name }}</td>
                <td>{{ $item->last_name }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ App\Models\JobPosition::findOrFail($item->job_position_id)->name}}</td>
                <td>{{ App\Models\Common::formatDate($item->employment_date) }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-flat btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-bottom">
                      <a href="{{ url('/employee_leaves/index',$item->id) }}" type="button" class="btn btn-sm">Manage Leaves</a>
                      <a href="{{ url('/employee_offdays/index',$item->id) }}" type="button" class="btn btn-sm">Manage Offdays</a>
                      <a href="{{ url('/employee_attendances/index',$item->id) }}" type="button" class="btn btn-sm">Manage Attendances</a>
                    </div>
                  </div>

                    <div class="btn-group" role="group" aria-label="Basic Example">
                        <a href="{{ url('/employees/detail',$item->id) }}" type="button" class="btn btn-flat btn-md btn-info">Detail</a>
                        <a href="{{ url('/employees/edit',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-warning">Edit</a>
                        <a href="{{ url('/employees/delete',$item->id) }}" type="button" class="btn btn-flat  btn-md btn-danger">Delete</a>
                    </div>
                </td>
              </tr>
            @endforeach        
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>JOB POSITION</th>
            <th>EMPLOYMENT DATE</th>
            <th>ACTION</th>
        </tr>
    </tfoot>
</table>

@endsection