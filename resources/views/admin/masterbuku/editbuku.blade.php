@extends('template')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Buku</h1>
                <p>Menambahkan data buku perpustakaan</p>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('masterbuku')}}">Master Buku</a></li>
                    <li class="breadcrumb-item active">Tambah Buku</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-auto">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i> Tambah Buku</h5>
                </div>
                <div class="card-body">
                    <form asction="tmbBuku" method="POST">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Judul Buku</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Klasifikasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Sinopsis</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="ISBN" id="ISBN" placeholder="Masukan koden ISBN"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger float-right ml-2" onclick="kembali()"><i class="fa-solid fa-arrow-left"></i> Kembali</button>
                        <button type="reset" class="btn btn-primary float-right ml-2"><i class="fa-solid fa-rotate-left"></i> Reset</button>
                        <button type="submit" name="simpan" class="btn btn-success float-right ml-2"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function kembali(){
        location.href = "{{url('masterbuku')}}";
    }
</script>
@endsection