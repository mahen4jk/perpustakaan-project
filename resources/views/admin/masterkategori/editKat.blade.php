@extends('layout.dashboard.admin.app')

@section('title')
    {{'Form Kategori'}}
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('kategori/masterkategori')}}">Master Kategori</a></li>
                    <li class="breadcrumb-item active"></a>Form Kategori</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Content -->
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-auto">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i> Tambah Buku</h5>
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="updateKAT" method="POST">
                        {{ csrf_field() }}
                        @foreach ($kode as $KAT)
                        <div class="form-group row" hidden>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Id Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Masukan koden ISBN" value="{{$KAT->id_kategori}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_kategori" id="kd_kategori" placeholder="Masukan kode kategori" value="{{$KAT->kode_kategori}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Jenis kategori" value="{{$KAT->kategori}}">
                            </div>
                        </div>
                        @endforeach
                        <button type="button" class="btn btn-danger float-right ml-2" onclick="kembali()"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
                        <button type="reset" class="btn btn-primary float-right ml-2"><i class="fa-solid fa-rotate-left"></i> Reset</button>
                        <button type="submit" name="simpan" class="btn btn-success float-right ml-2"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                    </form>
                    <!-- Form -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function kembali() {
        location.href = "{{url('kategori/masterkategori')}}";
    }
</script>
@endsection
