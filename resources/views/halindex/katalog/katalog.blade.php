@extends('layout.home.app')

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
                    <form action="{{ route('katalog.search') }}" method="GET">
                        <div class="form-group input-group">
                            <input type="text" class="form-control" name="search" id="search_buku"
                                placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-default" id="searchBtn" type="submit">
                                    <i class="fas fa-search"></i>
                                    &nbsp;Search
                                </button>
                            </div>
                        </div>
                    </form>
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
                            <div class="row no-gutters" id="searchResult">
                                <div class="col-md-4">
                                    @if ($katalog->cover)
                                        <img src="{{ asset('image/buku/' . $katalog->cover) }}" alt="Cover Buku"
                                            class="img-katalog img-thumbnail">
                                    @else
                                        <img src="{{ asset('image/no-image.png') }}" alt="No Image"
                                            class="img-katalog img-thumbnail ">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ url('detail-buku', encrypt($katalog->id_buku)) }}"
                                                class="detail-buku">
                                                {{ $katalog->judul }}
                                            </a>

                                        </h5>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Buku masuk: {{ $katalog->created_at->format('d-m-Y') }}
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
    <script>
        // $(document).ready(function() {
        //     $('#search_buku').autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        //                 url: '{{ route('katalog.search') }}',
        //                 type: 'GET',
        //                 data: {
        //                     term: request.search
        //                 },
        //                 dataType: "json",
        //                 success: function(data) {
        //                     response($.map(data, function(item) {
        //                         return {
        //                             label: item.judul,
        //                             value: item.judul
        //                         }
        //                     }));
        //                 }

        //             });
        //         },
        //         minLength: 1
        //     });
        // });

        $(document).ready(function() {
            $('#search_buku').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{ route('katalog.autocomplete') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            if (data.length === 0) {
                                response(['Judul yang Anda cari tidak tersedia']);
                            } else {
                                response(data);
                            }
                        }
                    });
                },
                minLength: 1, // Jumlah karakter minimal sebelum pencarian mulai dilakukan
                // Tambahkan opsi select untuk menonaktifkan fitur input dari pesan yang muncul
                select: function(event, ui) {
                    if (ui.item.value === 'Judul yang Anda cari tidak tersedia') {
                        return false; // Tidak memperbolehkan memilih pesan tersebut
                    }
                }
            });
        });
    </script>
@endsection
