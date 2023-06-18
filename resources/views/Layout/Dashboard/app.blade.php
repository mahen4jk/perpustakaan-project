<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Perpustakaan SMP Negeri 4 Waru | </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}"> --}}
    <!-- KALENDER -->
    {{-- <link rel="stylesheet" href="{{ url('assets/css/calendar.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('lte/plugins/fullcalendar/main.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('lte/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('assets/css/button.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/solid.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/brands.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    {{-- Date and Time Picker --}}
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap-datepicker.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('lte/dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ url('assets/image/logo.png') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('dashboard') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
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

                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <!-- Logout -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <i class="fa-solid fa-circle-user fa-2xl" src="" alt="ProfilePicture"></i>
                            </div>
                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                            <p class="text-muted text-center">{{ auth()->user()->level }}</p>
                            <a href="{{ route('logout') }}" class="btn btn-primary btn-block"><i
                                    class="fa-solid fa-power-off"></i><b>Logout</b></a>
                        </div>
                        <!-- /.card -->
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @section('siderbar')
            @include('Layout.Dashboard.sidebar',['user'=>Auth::user()])
        @show

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('header')
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
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
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <img src="{{ url('assets/image/logo.png') }}" alt="logo 4waru" style="height: 30px; width:30px">
            </div>
            <!-- Default to the left -->
            <strong>Perpustakaan <a href="https://smpn4warusidoarjo.sch.id/">SMP Negeri 4 Waru</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    {{-- <script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ url('assets/js/jquery-3.6.4.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ url('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('lte/dist/js/adminlte.min.js') }}"></script>
    <!-- Charts -->
    {{-- <script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ url('assets/js/chart.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- KALENDER -->
    <script src="{{ url('assets/js/fullcalendar.global.min.js') }}"></script>
    <script src="{{ url('assets/js/fullcalendar.global.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ url('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ url('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/moment.js') }}"></script>
    <script src="{{ url('lte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- yield --}}
    @include('sweetalert::alert')
    @yield('js')
</body>

</html>
