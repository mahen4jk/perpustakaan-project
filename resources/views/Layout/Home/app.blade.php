<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Perpustakaan SMP Negeri 4 Waru</title>
    <!-- Google Font: Source Sans Pro -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">

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
    {{-- AutoComplete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>
{{-- style --}}
@yield('css')

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ml-auto">
                    <!-- Dropdown -->
                    <a class="nav-item nav-link {{ Request()->is('/') ? 'active-page' : '' }}"
                        href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link {{ Request()->is('katalog', 'detail-buku') ? 'active-page' : '' }}"
                        href="{{ url('katalog') }}">Katalog</a>
                    <a class="nav-item nav-link {{ Request()->is('profile', 'visimisi', '') ? 'active-page' : '' }}"
                        href="{{ url('profile') }}">Profile</a>
                    <a class="nav-item nav-link {{ Request()->is('kunjungan') ? 'active-page' : '' }}"
                        href="{{ url('kunjungan') }}">Kunjungan</a>
                    <a class="nav-item nav-link" href="{{ url('login') }}">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Jumbotron -->
    @yield('jumbotron')
    <!-- Akhir Jumbotron -->

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>
    <!-- Akhir Content -->

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row mt-3">
                <div class="col-4 col-md">
                    <img src="{{ url('assets/image/logo.png') }}" alt="logo 4waru" style="height: 30px; width:30px">
                </div>
                <div class="col-4 col-md">
                    <h5>Profil</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="{{ url('profile') }}">Sejarah</a></li>
                        <li><a class="text-muted" href="{{ url('visimisi') }}">Visi & Misi</a></li>
                        <li><a class="text-muted" href="#">Struktur Organisasi</a></li>
                    </ul>
                </div>
                <div class="col-4 col-md">
                    <h5>Temukan Kami</h5>
                    <ul class="list-unstyled text-small">
                        <li>
                            <h5 class="text-muted">Alamat</h5>
                            <p class="text-muted">JPPW+457, Jl. Gajah Mada, Ngingas, Kec. Waru,
                                Kabupaten Sidoarjo, Jawa Timur 61256</p>
                        </li>
                        <li>
                            <h5 class="text-muted">Jam Operasional</h5>
                            <p class="text-muted">Senin - Kamis: 07.00 - 14.30 <br>
                                Jumat & Sabtu: 11:00 - 14.30</p>
                        </li>
                    </ul>
                </div>
                <div class="col-4 col-md">
                    <h5>Maps</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.90363248211!2d112.74283567581851!3d-7.364698272473822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4c3d39abb83%3A0x6be9ffbbb93b15e2!2sSMP%20Negeri%204%20Waru!5e0!3m2!1sen!2sid!4v1685286620302!5m2!1sen!2sid"
                        width="350" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Akhir -->

    {{-- jQuery --}}
    <script src="{{ url('assets/js/jquery-3.6.4.min.js') }}"></script>
    {{-- Bootstrap Js --}}
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    {{-- Autocomplete --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    {{-- Js LTE --}}
    <script src="{{ url('lte/dist/js/adminlte.min.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('lte/plugins/select2/js/select2.full.min.js') }}"></script>
    @yield('js')
</body>

</html>
