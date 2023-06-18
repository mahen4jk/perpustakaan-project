@extends('layout.dashboard.app')

@section('title')
    {{'Form Kelas'}}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('kelas/masterkelas') }}">Master Kelas</a></li>
                        <li class="breadcrumb-item active"></a>Form Kelas</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i> Tambah Kelas</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="simpanCLASS" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row" hidden>
                                <label for="staticEmail" class="col-sm-2 col-form-label">Kode Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_kelas" id="id_kelas"
                                        placeholder="Kode Kelas" required readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticKAT" class="col-sm-2 col-form-label">Nama Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kelas" id="nama_kelas"
                                        placeholder="Masukan nama kelas" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-2" onclick="kembali()"><i
                                    class="fa-solid fa-arrow-left"></i> Kembali</button>
                            <button type="reset" class="btn btn-primary float-right ml-2"><i
                                    class="fa-solid fa-rotate-left"></i> Reset</button>
                            <button type="submit" name="simpan" class="btn btn-success float-right ml-2"><i
                                    class="fa-regular fa-floppy-disk"></i> Simpan</button>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function kembali() {
            location.href = "{{ url('kelas/masterkelas') }}";
        }
    </script>
@endsection
