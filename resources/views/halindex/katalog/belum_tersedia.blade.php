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
                    <form action="{{route('katalog.search')}}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" id="searchInput" class="form-control"
                                placeholder="Search..." value="{{ old('search') }}">
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
                <div class="col-lg">
                    <div class="error-template">
                        <h1><i class="fa-solid fa-circle-xmark">&nbsp;</i>Tidak Ditemukan</h1>
                        <div class="error-details">
                            Mohon maaf buku yang kamu cari, saat ini belum tersedia.
                        </div>
                        <div class="error-actions">
                            <a href="{{url('katalog')}}" class="btn btn-primary btn-lg"><span class="fa-solid fa-arrow-left"></span>
                                Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Tampilan Buku -->
@endsection

@section('js')
@endsection
