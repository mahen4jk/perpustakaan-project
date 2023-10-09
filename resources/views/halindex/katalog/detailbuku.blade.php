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
                @foreach ($buku as $buku)
                    <div class="col-lg-3">
                        @if ($buku->cover && !empty($buku->cover))
                            <img src="{{ asset('image/buku/' . $buku->cover) }}" alt="Cover Buku"
                                class="img-thumbnail img-detBuku">
                        @else
                            <img src="{{ asset('image/no-image.png') }}" alt="No Image" class="img-thumbnail img-detBuku">
                        @endif
                    </div>
                    <div class="col-lg-6 deskripsi-buku">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th style="">Judul</th>
                                    <td>{{ $buku->judul }}</td>
                                </tr>
                                <tr>
                                    <th style="">ISBN</th>
                                    <td>{{ $buku->isbn }}</td>
                                </tr>
                                <tr>
                                    <th style="">Pengarang</th>
                                    <td>{{ $buku->pengarang }}</td>
                                </tr>
                                <tr>
                                    <th style="">Penerbit</th>
                                    <td>
                                        @foreach ($penerbit as $penerbit1)
                                            @if ($penerbit1->id_penerbit == $buku->penerbit_id)
                                                {{ $penerbit1->nama_penerbit }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="">Class</th>
                                    <td>{{ $buku->class_id }}
                                        @foreach ($klasifikasi as $class)
                                            @if ($class->id_class == $buku->class_id)
                                                {{ $class->ket }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="">Kategori</th>
                                    <td>
                                        @foreach ($kategori as $kategori1)
                                            @if ($kategori1->id_kategori == $buku->kategori_id)
                                                {{ $kategori1->kode_kategori }}
                                                {{ $kategori1->kategori }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="">Tahun Terbit</th>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                </tr>
                                <tr>
                                    <th style="">Stok</th>
                                    <td>{{ $buku->stok_buku }}&nbsp;Eks</td>
                                </tr>
                                <tr>
                                    <th style="">Status</th>
                                    <td>Tersisa&nbsp;{{ $buku->sisa_exemplar }}&nbsp;Eks</td>
                                </tr>
                                <tr>
                                    <th style="">Deskripsi</th>
                                    <td>{{ $buku->deskripsi }}</td>
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
