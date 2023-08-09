<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ url('assets/image/logo.png') }}" alt="SMPN 4 WARU" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SMP Negeri 4 Waru</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->avatar)
                    <img class="img-circle elevation-2" src="{{ asset('image/user/' . Auth::user()->avatar) }}"
                        alt="User Image">
                @else
                    <img class="img-circle elevation-2" src="{{ asset('image/no-image.png') }}" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
                @if (auth()->user()->roles == 'admin')
                    <li class="nav-header">Master Anggota</li>
                    <li
                        class="nav-item {{ Request()->is('anggota/masteranggota', 'kelas/masterkelas') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request()->is('anggota/masteranggota', 'kelas/masterkelas') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-users-rectangle"></i>
                            <p>
                                Anggota
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('anggota/masteranggota') }}"
                                    class="nav-link {{ Request()->is('anggota/masteranggota') ? 'active' : '' }}">
                                    <i class="nav-icon fa-regular fa-user"></i>
                                    <p>Master Anggota</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('kelas/masterkelas') }}"
                                    class="nav-link {{ Request()->is('kelas/masterkelas') ? 'active' : '' }}">
                                    <i class="fa-solid fa-school nav-icon"></i>
                                    <p>Master Kelas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-header">Master Buku</li>
                <li
                    class="nav-item {{ Request()->is('buku/masterbuku', 'kategori/masterkategori', 'penerbit/masterpenerbit', 'ddc/masterddc') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request()->is('buku/masterbuku', 'kategori/masterkategori', 'penerbit/masterpenerbit', 'ddc/masterddc') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-book"></i>
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
                                <i class="fa-solid fa-tags nav-icon"></i>
                                <p>Master Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('penerbit/masterpenerbit') }}"
                                class="nav-link {{ Request()->is('penerbit/masterpenerbit') ? 'active' : '' }}">
                                <i class="fa-solid fa-user-tie nav-icon"></i>
                                <p>Master Penerbit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('ddc/masterddc') }}"
                                class="nav-link {{ Request()->is('ddc/masterddc') ? 'active' : '' }}">
                                <i class="fa-solid fa-box-archive nav-icon"></i>
                                <p>Master DDC</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Sirkulasi</li>
                <li
                    class="nav-item {{ Request()->is('sirkulasi/peminjaman', 'sirkulasi/pengembalian') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request()->is('sirkulasi/peminjaman', 'sirkulasi/pengembalian') ? 'active' : '' }}">
                        {{-- <i class="fa-solid fa-arrows-up-down nav-icon"></i> --}}
                        <i class="fa-solid fa-book nav-icon"></i>
                        <p>
                            Sirkulasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('sirkulasi/peminjaman') }}"
                                class="nav-link {{ Request()->is('sirkulasi/peminjaman', 'sirkulasi/pengembalian') ? 'active' : null }}">
                                <i class="far fa-circle"></i>
                                <p>Peminjaman/Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Master Denda</li>
                <li class="nav-item {{ Request()->is('denda/masterdenda') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request()->is('denda/masterdenda') ? 'active' : '' }}">
                        <i class="fa-solid fa-dollar-sign nav-icon"></i>
                        <p>
                            Denda
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('denda/masterdenda') }}"
                                class="nav-link {{ Request()->is('denda/masterdenda') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Denda</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Laporan</li>
                <li
                    class="nav-item {{ Request()->is('laporan/buku', 'laporan/kunjungan',
                    'laporan/peminjaman', 'laporan/pengembalian') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request()->is('laporan/buku', 'laporan/kunjungan', 'laporan/sirkulasi') ? 'active' : '' }}">
                        <i class="fa-solid fa-envelope nav-icon"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('laporan/buku') }}"
                                class="nav-link {{ Request()->is('laporan/buku') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Buku</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('laporan/peminjaman') }}"
                                class="nav-link {{ Request()->is('laporan/peminjaman','laporan/pengembalian') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Sirkulasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request()->is('#') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Kunjungan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (auth()->user()->roles == 'admin')
                    <li class="nav-header">Petugas</li>
                    <li class="nav-item {{ Request()->is('petugas/masterpetugas') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request()->is('petugas/masterpetugas') ? 'active' : '' }}">
                            <i class="fa-regular fa-user-plus nav-icon"></i>
                            <p>
                                Petugas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('petugas/masterpetugas') }}"
                                    class="nav-link {{ Request()->is('petugas/masterpetugas') ? 'active' : null }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Petugas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
