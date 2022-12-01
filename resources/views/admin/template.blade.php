<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language='JavaScript'>
        var txt = "Dashboard | Perpustakaan SMP Negeri 4 Waru | ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('lte/plugins/fontawesome-free/css/all.min.css') }}">
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

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('lte/dist/css/adminlte.min.css') }}">
    <link href="{{ url('assets/image/logo.png') }}" rel="shortcut icon">
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
                    <a href="{{ url('index') }}" class="nav-link">Home</a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('index') }}" class="brand-link">
                <img src="{{ url('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li
                            class="nav-item {{ Request()->is('/anggota/masteranggota', 'kelas/masterkelas') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request()->is('/anggota/masteranggota', 'kelas/masterkelas') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Anggota
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Request()->is('/anggota/masteranggota') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master Anggota</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('kelas/masterkelas') }}"
                                        class="nav-link {{ Request()->is('kelas/masterkelas') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master Kelas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ Request()->is('buku/masterbuku', 'kategori/masterkategori', 'penerbit/masterpenerbit', 'ddc/masterddc') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ Request()->is('buku/masterbuku', 'kategori/masterkategori', 'penerbit/masterpenerbit', 'ddc/masterddc') ? 'active' : '' }}">
                                <i class="bi bi-book"></i>
                                <p>
                                    Buku
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('buku/masterbuku') }}"
                                        class="nav-link {{ Request()->is('buku/masterbuku') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master Buku</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('kategori/masterkategori') }}"
                                        class="nav-link {{ Request()->is('kategori/masterkategori') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('penerbit/masterpenerbit') }}"
                                        class="nav-link {{ Request()->is('penerbit/masterpenerbit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master Penerbit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('ddc/masterddc') }}"
                                        class="nav-link {{ Request()->is('ddc/masterddc') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master DDC</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ Request::segment(1) === 'sirkulasi' ? 'active' : null }}">
                                <i class="bi bi-book"></i>
                                <p>
                                    Sirkulasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Request::segment(1) === 'buku/masterbuku' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ Request::segment(1) === 'kategori/masterkategori' ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengembalian</p>
                                    </a>
                                </li>
                            </ul>
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
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('sweetalert::alert')
    <!-- jQuery -->
    <script src="{{ url('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ url('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('lte/dist/js/adminlte.min.js') }}"></script>
    <!-- Charts -->
    <script src="{{ url('lte/plugins/chart.js/Chart.min.js') }}"></script>
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
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            //select-option penerbit
            $('.penerbit').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Penerbit",
                allowClear: true
            });
            //select-option klasifikasi
            $('.klasifikasi').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Klasifikasi",
                allowClear: true
            });
            //select-option kategori
            $('.kategori').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Kategori",
                allowClear: true
            });

            //Modal Detail Buku
            $(document).on('click','#detail-buku',function(){
                var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                var isbn = $(this).data('isbn');
                var pengarang = $(this).data('pengarang');
                var id_penerbit = $(this).data('id_penerbit');
                var klasifikasi = $(this).data('klasifikasi');
                var id_kategori = $(this).data('id_kategori');
                var tahun_terbit = $(this).data('tahun_terbit');
                var stok_buku = $(this).data('stok_buku');
                var deskripsi = $(this).data('deskripsi');
                $('#id_buku').text(id_buku);
                $('#judul').text(judul);
                $('#isbn').text(isbn);
                $('#pengarang').text(pengarang);
                $('#penerbit').text(id_penerbit);
                $('#klasifikasi').text(klasifikasi);
                $('#kategori').text(id_kategori);
                $('#tahun_terbit').text(tahun_terbit);
                $('#stok_buku').text(stok_buku);
                $('#deskripsi').text(deskripsi);
            })
            //Modal Detail Penerbit
            $(document).on('click', '#detail-penerbit', function() {
                var id_penerbit = $(this).data('id_penerbit');
                var nama_penerbit = $(this).data('nm_penerbit');
                var alamat = $(this).data('alamat');
                var pic_hp = $(this).data('pic_hp');
                var email = $(this).data('email');
                $('#id_penerbit').text(id_penerbit);
                $('#nm_penerbit').text(nama_penerbit);
                $('#alamat').text(alamat);
                $('#pic_hp').text(pic_hp);
                $('#email').text(email);
            });

            // Delete Kategori
            $('.btnDelKAT').click(function() {
                var kategoriid = $(this).attr('data-id');
                var kategorinm = $(this).attr('data-name');
                Swal.fire({
                    title: 'Yakin ?',
                    text: "Kamu akan menghapus data kategori dengan nama " + kategorinm + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusKAT/" + kategoriid + "";
                        Swal.fire(
                            'Deleted!',
                            'Data berhasil dihapus',
                            'success'
                        )
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
            });

            // Delete Penerbit
            $('.btnDelPEN').click(function() {
                var penerbitid = $(this).attr('data-id');
                var penerbitnm = $(this).attr('data-name');
                Swal.fire({
                    title: 'Yakin ?',
                    text: "Kamu akan menghapus data penerbit " + penerbitnm + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusPEN/" + penerbitid + "";
                        Swal.fire(
                            'Deleted!',
                            'Data berhasil dihapus',
                            'success'
                        )
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
            });
            // Delete Kelas
            $('.btnDelKelas').click(function() {
                var kelasid = $(this).attr('data-id');
                var kelasnama = $(this).attr('data-name');
                Swal.fire({
                    title: 'Yakin ?',
                    text: "Kamu akan menghapus data penerbit " + kelasnama + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusKEL/" + kelasid + "";
                        Swal.fire(
                            'Deleted!',
                            'Data berhasil dihapus',
                            'success'
                        )
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
            });

            // Tabel
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
