@extends('layouts.hr_layout')

@section('module_content')

    <h2>Create Page</h2>

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

    <form action="{{ url('/employees/createPost') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <label>Location:</label><br/>
                <select id="location" name="location_id" class="form-control">
                    <option value="0">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ ucFirst($location->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="mb-1">Select Sub Location</label>
                <select name="sub_location_id" id="sublocation" class="form-control"></select>
            </div>
            <div class="col-md-3">
                <label class="mb-1">Select Department</label>
                <select name="department_id" id="department" class="form-control"></select>
            </div>
            <div class="col-md-3">
                <label class="mb-1">Select Sub Department</label>
                <select name="sub_department_id" id="subdepartment" class="form-control"></select>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>

        <div class="row">            
            <div class="col-md-3">
                <label class="mb-1">Select Job Position</label>
                <select name="job_position_id" id="jobposition" class="form-control" required></select>
            </div>            
            <div class="col-md-3">
                <label class="mb-1">ID:</label>
                <input type="text" name="code" class="form-control" />
            </div>
            <div class="col-md-3">
                <label class="mb-1">First Name:</label>
                <input type="text" name="first_name" class="form-control" />
            </div>
            <div class="col-md-3">
                <label class="mb-1">Middle Name:</label>
                <input type="text" name="middle_name" class="form-control" />
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>

        <div class="row">            
            <div class="col-md-3">
                <label class="mb-1">Last Name:</label>
                <input type="text" name="last_name" class="form-control" />
            </div>
            <div class="col-3">
                <label class="mb-1">Gender:</label>
                <select name="gender" class="form-control">
                    <option value="0">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="mb-1">DOB:</label>
                <input type="date" name="dob" class="form-control date" />
            </div>
            <div class="col-md-3">
                <label class="mb-1">Mobile No:</label>
                <input type="text" name="mobile_no" class="form-control" />
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>

        <div class="row">
            <div class="col-lg-3">
                <label class="mb-1">Employment Date:</label>
                <input type="date" name="employment_date" class="form-control" />
            </div>
        </div>

        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-12">
                <label>Address:</label><br/>
                <textarea name="address" class="form-control" rows="3" cols="50"></textarea>
            </div>
        </div>
        <div style="height:10px;">&nbsp;</div>
        <div class="row">
            <div class="col-md-4">
                <label></label><br/>
                <input type="submit" value="Save" class="btn btn-md btn-flat btn-info" />
                <a href="{{ url('/employees')}}" class="btn btn-md btn-flat btn-danger">Cancel</a>
            </div>
        </div>
    </form>
  
@endsection
