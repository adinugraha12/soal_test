<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sukoharjo.com</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Info & Role Badge -->
      <li class="nav-item">
        <span class="nav-link">
          <i class="fas fa-user"></i> {{ Auth::user()->name }}
          @if(Auth::user()->isAdmin())
            <span class="badge badge-danger ml-1">ADMIN</span>
          @else
            <span class="badge badge-info ml-1">MANAGER</span>
          @endif
        </span>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="http://portal.sukoharjokab.go.id/wp-content/uploads/2018/01/logo-fix.png" alt="Logo Kabupaten Sukoharjo" class="brand-image img-circle elevation-3" style="opacity: 90">
      <span class="brand-text font-weight-light">KAB.SUKOHARJO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1682472549~exp=1682473149~hmac=7d2bf470656d417964448217b3b3c9760d0b71e460cc8351afc6a78c4c9b35eb" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <small class="text-muted">
            @if(Auth::user()->isAdmin())
              <i class="fas fa-circle text-danger"></i> Administrator
            @else
              <i class="fas fa-circle text-info"></i> Manager
            @endif
          </small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Menu Kependudukan - Bisa diakses Admin & Manager -->
          <li class="nav-item">
            <a href="/kependudukan" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Kependudukan</p>
            </a>
          </li>

          <!-- Menu Tambah Penduduk - HANYA ADMIN -->
          @if(Auth::user()->isAdmin())
          <li class="nav-item">
            <a href="/tambah" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Tambah Penduduk</p>
            </a>
          </li>
          @endif

          <!-- Menu Export/Download -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Export Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kependudukan/cetak_pdf" class="nav-link">
                  <i class="far fa-file-pdf nav-icon text-danger"></i>
                  <p>Download PDF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kependudukan/export_excel" class="nav-link">
                  <i class="far fa-file-excel nav-icon text-success"></i>
                  <p>Download Excel</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">AKUN</li>

          <!-- Logout -->
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KAB.SUKOHARJO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2022-2023 <a href="https://adminlte.io">AdiNugraha.com</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>