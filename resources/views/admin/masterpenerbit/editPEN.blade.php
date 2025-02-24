@extends('layout.dashboard.app')

@section('title')
    {{'Form Penerbit'}}
@endsection

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Penerbit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('penerbit/masterpenerbit')}}">Master Penerbit</a></li>
                    <li class="breadcrumb-item active">Master Penerbit</li>
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
                    <form action="updatePEN" method="POST">
                        {{ csrf_field() }}
                        @foreach($kode as $PEN)
                        <div class="form-group row" hidden>
                            <label for="staticIDPen" class="col-sm-2 col-form-label">Kode Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_penerbit" id="kd_penerbit" placeholder="Masukan kode penerbit" value="{{$PEN->id_penerbit}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNmPen" class="col-sm-2 col-form-label">Nama Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_penerbit" id="nm_penerbit" placeholder="Masukan nama penerbit" value="{{$PEN->nama_penerbit}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAdd" class="col-sm-2 col-form-label">Alamat Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan alamat penerbit" value="{{$PEN->alamat}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticPic-HP" class="col-sm-2 col-form-label">Pic-Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pic_hp" id="pic-hp" placeholder="Masukan Pic-Hp" value="{{$PEN->pic_hp}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email" value="{{$PEN->email}}">
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
        location.href = "{{url('penerbit/masterpenerbit')}}";
    }
</script>
@endsection
