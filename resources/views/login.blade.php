@extends('layouts.guest_layout')

@section('main_content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-navy">
      <div class="card-header text-center">
        <a href="index2.html" class="h1"><b>AQ</b> System</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign In</p>
        @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
          </div>
        @endif
        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-lg btn-flat btn-info">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->


  @section('main_content')