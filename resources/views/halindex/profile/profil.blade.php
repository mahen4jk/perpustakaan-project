@extends('halindex.temp_index')

@section('title')
    {{ 'Profil' }}
@endsection

@section('style')
    <style>
        .heading-container {
            padding-top: 100px;
            padding-left: 218px;
            padding-right: 218px;
        }
    </style>
@endsection

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid jmb-profile">
        <div class="container">
            <h1 class="display-4">Profil</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-2">
            <div class="box">
                <a href="{{ url('profile') }}"
                    class="list-group-item list-group-item-action {{ Request()->is('profile') ? 'active-list' : '' }}">
                    Sejarah
                </a>
                <a href="{{url('visimisi')}}" class="list-group-item list-group-item-action">Visi dan Misi</a>
                <a href="#" class="list-group-item list-group-item-action">Struktur Organisasi</a>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="box-profile">
                <h1>Perpustakaan SMP Negeri 4 Waru</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item {{ Request()->is('profile') ? 'active' : '' }}">
                        Profile
                    </li>
                </ol>
                <p></p>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
