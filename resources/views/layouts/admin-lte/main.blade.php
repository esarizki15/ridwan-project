<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/responsive.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/rowReorder.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .header-primary{
      background-color: blue;
      color: white;
    }
    .select2-container .select2-selection--single {
      height: auto;
      border:1px solid #ced4da;
    }
    .select2-container--default.select2-container--focus .select2-selection--single{
      border:1px solid #ced4da;
      max-height: calc(2.25rem + 2px) !important;
    }
    .select2-container--default .select2-container--below .select2-container--focus{
      border:1px solid #ced4da;
      max-height: calc(2.25rem + 2px) !important;
    }
    .select2-container--default .select2-selection--single {
      max-height: calc(2.25rem + 2px) !important;
    }
  </style>
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.admin-lte.navbar')
  <!-- /.navbar -->

  {{-- Sidebar --}}
  @include('layouts.admin-lte.sidebar')
  {{-- Sidebar --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('layouts.admin-lte.footer')
  @stack('modal')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/ozc9x14w309wc8eot0igzgly7fpfjmxtln50aaj7fi2mfrj2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '.tinymce'
  });
</script>
  <script>
    function openModal(url) {
        var modalImg = $('#img-exampleModal');
        modalImg.attr('src', url);
        $('#exampleModal').modal('toggle')
    }
    $(document).ready(function() {
        $('.select-2').select2();
    });
    $('.btn-danger').on("click", function(e){
      e.preventDefault();
      var form = this.closest('form');
      Swal.fire({
          title: 'Anda akan menghapus data ini!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes'
      }).then((value)=>{
          if(value.isConfirmed) {
            form.submit()
          }
      });
    });
    function logout(e){
      var form = $('#logout-form');
      Swal.fire({
          title: 'Yakin?',
          text: 'Anda akan keluar dari aplikasi ini!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'No',
          confirmButtonText: 'Yes'
      }).then((value)=>{
          if(value.isConfirmed) {
            form.submit()
          }
      });
    }
  </script>
@yield('script')
</body>
</html>
