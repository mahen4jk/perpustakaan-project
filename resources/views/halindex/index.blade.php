@extends('halindex.temp_index')

@section('title')
    {{ 'Selamat Datang' }}
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
    <div class="jumbotron jumbotron-fluid jmb-header">
        <div class="container">
            <img class="img-jmb" src="{{ url('assets/image/logo.png') }}" alt="logo smp 4 waru">
            <h1 class="display-4">Selamat Datang di Perpustakaan <br> SMP Negeri 4 Waru</h1>
            <p class="lead">Di sini Anda dapat menemukan berbagai koleksi
                buku yang bermanfaat untuk kebutuhan belajar dan hobi Anda.<br>
                Selain itu, kami juga menyediakan fasilitas seperti ruang baca dan internet gratis
                untuk membantu Anda dalam mengeksplorasi dunia pengetahuan.
            </p>
        </div>
    </div>
@endsection

@section('content')
@endsection

@section('js')
@endsection
