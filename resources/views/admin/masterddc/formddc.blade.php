@extends('layout.dashboard.app')

@section('title')
    {{ 'Form DDC' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form DDC</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('ddc/masterddc') }}">Master DDC</a></li>
                        <li class="breadcrumb-item active"></a>Form DDC</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i> Tambah Kategori</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="simpanDDC" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Kode DDC</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode_class" id="DDC"
                                        placeholder="Masukan Kode DDC">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticKAT" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ket" id="keterangan"
                                        placeholder="Masukan keterangan dari kode ddc">
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
@endsection

@section('js')
    <script type="text/javascript">
        function kembali() {
            location.href = "{{ url('ddc/masterddc') }}";
        }
    </script>
@endsection
