<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Perpustakaan SMP Negeri 4 Waru</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- KALENDER -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('lte/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('assets/css/button.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/solid.css') }}">
    <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/brands.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/haldepan.css') }}">
    <!-- Icon -->
    <link rel="icon" href="{{ url('assets/image/logo.png') }}">
</head>
{{-- style --}}
@yield('style')

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link {{ Request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Katalog</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown {{ Request()->is('profile') ? 'menu-open' : '' }}">
                    <a class="nav-link dropdown-toggle {{ Request()->is('profile', 'visimisi', 'struktur') ? 'active' : '' }}"
                        href="#" id="navbardrop" data-toggle="dropdown">
                        Profil
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ Request()->is('profile') ? 'active' : '' }}"
                            href="{{ url('profile') }}">Sejarah</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kunjungan</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    @yield('jumbotron')
    <div class="container-fluid pt-3">
        @yield('content')
    </div>

    {{-- jQuery --}}
    <script src="{{ url('assets/js/jquery-3.6.4.min.js') }}"></script>
    {{-- Bootstrap Js --}}
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    {{-- Js LTE --}}
    <script src="{{ url('lte/dist/js/adminlte.min.js') }}"></script>
    @yield('js')
</body>

</html>
