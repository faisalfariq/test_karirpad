<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyApps</title>
  <link rel="icon" href="{{ asset ('img/laravel.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset ('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset ('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset ('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset ('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset ('plugins/jquery-ui/jquery-ui.css') }}">
  <!-- CSS only -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item dropdown">
          <a class="nav-link text-secondary" data-toggle="dropdown" href="#">
            <strong>{{auth()->user()->nama_pegawai}}</strong> <i class="right fas fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
            <a href="{{ url ('/logout') }}" class="dropdown-item">
              <span class="text-danger"><b><i class="nav-icon fas fa-sign-out-alt" style="margin-right: 10px;"></i>Logout</b></span>
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-olive elevation-4" id="sidebar">

      <a  class="brand-link text-center">
        <span ><b>MyApps</b></span>
      </a>

        <div class="sidebar " > 

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('superuser-access')
            <li class="nav-item">
              <a href="{{ route('produk.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-gifts"></i>
                <p>
                    Produk
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('kategori_produk.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-gift"></i>
                <p>
                   Kategori Produk
                </p>
              </a>
            </li>
          @endcan
          @can('user-access')
            <li class="nav-item">
              <a href="{{ route('user_produk.index') }}" class="nav-link ">
              <i class="nav-icon fas fa-gift"></i>
                <p>
                   View Produk
                </p>
              </a>
            </li>
            @endcan

            <li class="nav-item">
              <a class="nav-link" href="{{ url ('/logout') }}">
                <span class="text-danger"><b>
                  <i class="nav-icon fas fa-sign-out-alt" style="margin-right: 10px;"></i>
                  Logout</b>
                </span>
              </a>
            </li>

            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="content-wrapper">
      <section class="content-header">


      <!-- Main content -->
      <section class="content mt-5" style="margin: top 60px !important;">
        <div class="container-fluid text-center">
          @include('flash-message')
          @yield('content')
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center layout-footer-fixed">
      <strong>Copyright &copy; 2021 <a href="">Moh. Faisal Fariq</a>.</strong>
      All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </script>
  <!-- ./Script Baru -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

    
  <!-- jQuery UI 1.11.4 -->
  <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Bootstrap 4 -->
  <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script  type="text/javascript" src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script  type="text/javascript" src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->

  <script  type="text/javascript"src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{ asset('plugins/moment/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script type="text/javascript" src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script type="text/javascript" src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script type="text/javascript" src="{{ asset('js/adminlte.js') }}"></script>
 
  <script type="text/javascript" src="{{ asset('js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script type="text/javascript" src="{{ asset('js/demo.js') }}"></script>

  <script type="text/javascript" src="{{ asset('js/my_js/my_js.js') }}"></script>

  

</body>
</html>
