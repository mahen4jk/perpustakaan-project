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
    {{-- <div class="row justify-content-center">
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
    </div> --}}
    <!-- Akhiran Search -->

    <!-- Tampilan Detail Buku -->
    <div class="row detail-buku">
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="margin-top: 5px">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('katalog') }}">Katalog</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <hr style="margin-top: -15px; border: 1px solid black;">
                </div>
            </div>
            <div class="row">
                @foreach ($kode as $katalog)
                    <div class="col-lg-3">
                        @if ($katalog->cover)
                            <img src="{{ asset('image/buku/' . $katalog->cover) }}" alt="Cover Buku" class="img-detBuku">
                        @else
                            <img src="{{ asset('image/no-image.png') }}" alt="No Image" class="img-detBuku">
                        @endif
                    </div>
                    <div class="col-lg-6 deskripsi-buku">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th style="">Judul</th>
                                    <td>{{$katalog->judul}}</td>
                                </tr>
                                <tr>
                                    <th style="">ISBN</th>
                                    <td>{{$katalog->isbn}}</td>
                                </tr>
                                <tr>
                                    <th style="">Pengarang</th>
                                    <td>{{$katalog->pengarang}}</td>
                                </tr>
                                <tr>
                                    <th style="">Penerbit</th>
                                    <td>{{$katalog->penerbit_id}}</td>
                                </tr>
                                <tr>
                                    <th style="">Class</th>
                                    <td>{{$katalog->class_id}} &nbsp;
                                        {{$katalog->class_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th style="">Kategori</th>
                                    <td>{{$katalog->kategori_id}}</td>
                                </tr>
                                <tr>
                                    <th style="">Tahun Terbit</th>
                                    <td>{{$katalog->tahun_terbit}}</td>
                                </tr>
                                <tr>
                                    <th style="">Stok</th>
                                    <td>{{$katalog->stok_buku}}</td>
                                </tr>
                                <tr>
                                    <th style="">Deskripsi</th>
                                    <td>{{$katalog->deskripsi}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="col-lg-3">
                    <button type="button" class="btn btn-default float-right ml-2" onclick="kembali()"><i
                            class="fa-solid fa-arrow-left"></i> Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Tampilan Detail Buku -->
@endsection

@section('js')
    <script>
        function kembali() {
            location.href = "{{ url('katalog') }}";
        }
    </script>
@endsection
