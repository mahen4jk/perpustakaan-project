@extends('halindex.temp_index')

@section('title')
    {{ 'Halaman Depan' }}
@endsection

@section('style')
    <style>
        .img-center {
            display: block;
            margin: 0 auto;
            text-align: center;
            height: 100px;
            width: fit-content;
        }
    </style>
@endsection

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <img src="{{ url('assets/image/logo.png') }}" alt="logo smp 4 waru" class="img-center">
            <h3 class="text-center mt-3">Selamat Datang di Perpustakaan</h3>
            <h3 class="text-center mt-3">SMP Negeri 4 Waru</h3>
            <p class="text-center mt-3">Di sini Anda dapat menemukan berbagai koleksi buku yang bermanfaat untuk
                kebutuhan
                belajar dan hobi Anda.
            </p>
            <p class="text-center">Selain itu, kami juga menyediakan fasilitas seperti ruang baca dan internet gratis
                untuk membantu Anda
                dalam
                mengeksplorasi dunia pengetahuan.</p>
        </div>
    </div>
@endsection

@section('content')
@endsection

@section('js')
@endsection
