<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AQ | HR System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm control-sidebar-slide-open">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light bg-cyan">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color:white;"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/home')}}" style="color:white;" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" style="color:white;" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" style="color:white;" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}" style="color:white;">
          <i class="fa fa-power-off"></i>
        </a>
      </li>

      <!--<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->

    </ul>
  </nav>
  <!-- /.navbar -->

  @yield('main_content')

  <!-- Control Sidebar 
  <aside class="control-sidebar control-sidebar-dark">
  </aside>-->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ url('/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ url('/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ url('/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ url('/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ url('/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ url('/plugins/chart.js/Chart.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ url('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ url('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ url('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- AdminLTE for demo purposes
<script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/dist/js/pages/dashboard2.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
  $(document).ready(function(){

    //sub location listing
    $('#location').on('change', function () {
      let id = $(this).val();
      $("#sublocation").html('');
      
      $.ajax({
          url: '/employees/fetchSubLocations/'+id,
          method: "GET",
          success: function(result){
            var response = JSON.parse(result);
            $('#sublocation').append("<option value='0' selected disabled>Select Sub Location</option>");
            
            response.forEach(function(item, index) {
                $('#sublocation').append($('<option>', {
                    id: item.id,
                    value: item.id,
                    text: item.name
                }));                
            });

            $('#department').html('');
            $('#subdepartment').html('');
            $('#jobposition').html('');
          },
          error: function (request, error) {
              alert("Check the route and/or controller side");
          },
        });
      
    });

    //department listing
    $('#sublocation').on('change', function () {
      let id = $(this).val();
      $("#department").html('');
      
      $.ajax({
          url: '/employees/fetchDepartments/'+id,
          method: "GET",
          success: function(result){
            var response = JSON.parse(result);
            $('#department').append("<option value='0' selected disabled>Select Department</option>");
            
            response.forEach(function(item, index) {
                $('#department').append($('<option>', {
                    id: item.id,
                    value: item.id,
                    text: item.name
                }));                
            });

            $('#subdepartment').html('');
            $('#jobposition').html('');
          },
          error: function (request, error) {
              alert("Check the route and/or controller side");
          },
        });
      
    });

    //sub department listing
    $('#department').on('change', function () {
      let id = $(this).val();
      $("#subdepartment").html('');
      
      $.ajax({
          url: '/employees/fetchSubDepartments/'+id,
          method: "GET",
          success: function(result){
            var response = JSON.parse(result);
            $('#subdepartment').append("<option value='0' selected disabled>Select Sub Department</option>");
            
            response.forEach(function(item, index) {
                $('#subdepartment').append($('<option>', {
                    id: item.id,
                    value: item.id,
                    text: item.name
                }));                
            });

            $('#jobposition').html('');
          },
          error: function (request, error) {
              alert("Check the route and/or controller side");
          },
        });
      
    });

    //job position listing
    $('#subdepartment').on('change', function () {
      let id = $(this).val();
      $("#jobposition").html('');
      
      $.ajax({
          url: '/employees/fetchJobPositions/'+id,
          method: "GET",
          success: function(result){
            var response = JSON.parse(result);
            $('#jobposition').append("<option value='0' selected disabled>Select Job Position</option>");
            
            response.forEach(function(item, index) {
                $('#jobposition').append($('<option>', {
                    id: item.id,
                    value: item.id,
                    text: item.name
                }));                
            });

          },
          error: function (request, error) {
              alert("Check the route and/or controller side");
          },
        });
      
    });

  });
</script>

</body>
</html>
