@extends('halindex.temp_index')

@section('title')
    {{ 'Katalog' }}
@endsection

@section('style')
    {{-- <style>
        .img-jmb {
            display: block;
            margin: 0 auto;
            text-align: center;
            height: 100px;
            width: fit-content;
        }
    </style> --}}
@endsection

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid jmb-katalog">
        <div class="container">
            <h1 class="display-4">Katalog</h1>
        </div>
    </div>
@endsection

@section('content')
    <!-- Search Katalog -->
    <div class="row justify-content-center">
        <div class="col-lg-10 search-katalog">
            <div class="row">
                <div class="col-lg">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhiran Search -->

    <!-- Tampilan Buku -->
    <div class="row tampilan-buku">
        <div class="col-lg-12">
            <div class="row">
                @foreach ($buku as $katalog)
                    <div class="col-lg-6">
                        <div class="card card-katalog mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    @if ($katalog->cover)
                                        <img src="{{ asset('image/buku/' . $katalog->cover) }}" alt="Cover Buku"
                                            class="img-katalog">
                                    @else
                                        <img src="{{ asset('image/no-image.png') }}" alt="No Image" class="img-katalog">
                                    @endif
                                    {{-- <img src="{{ url('assets/image/png-clipart-book-book.png') }}" class="img-katalog"
                                        alt="gambar buku"> --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="detail-buku/{{ encrypt($katalog->id_buku) }}" class="">
                                                {{ $katalog->judul }}
                                            </a>

                                        </h5>
                                        {{-- @php
                                            $panjangMax = 97; // Panjang maksimum deskripsi yang ingin ditampilkan
                                            $deskripsi = $katalog->deskripsi;
                                        @endphp
                                        @if (strlen($deskripsi) > $panjangMax)
                                            <p style="font-size: 14px">
                                                {{ substr($deskripsi, 0, $panjangMax) }}
                                                <a href="#">Read More</a>
                                            </p>
                                        @else
                                            <p>{{ $deskripsi }}</p>
                                        @endif --}}
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Buku masuk: {{ $katalog->created_at }}
                                            </small><br>
                                            <small class="text-muted">
                                                <i class="fa-solid fa-user"></i>
                                                &nbsp;{{ $katalog->pengarang }}
                                            </small><br>
                                            <small class="text-muted">
                                                <i class="fa-solid fa-circle-check"></i>
                                                &nbsp;{{ $katalog->kategori->kategori }}
                                            </small></br>
                                            <small class="text-muted">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                &nbsp;{{ $katalog->tahun_terbit }}
                                            </small><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Akhir Tampilan Buku -->
    {{-- Pagination --}}
    <div class="row">
        <div class="col-md-12">
            <!-- Tampilkan navigasi pagination dengan Bootstrap -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center pagi-ubah">
                    {{ $bukuPaginator->links() }}
                </ul>
            </nav>
        </div>
    </div>
    {{-- Tampilan Akhir Pagination --}}
@endsection

@section('js')
@endsection
