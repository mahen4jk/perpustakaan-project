@extends('layout.dashboard.app')

@section('title')
    {{ 'Master DDC' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Denda</h1>
                    </p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('denda/masterdenda')}}">Master Denda</a></li>
                        <li class="breadcrumb-item active">Form Denda</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i>&nbsp;Tambah Denda</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="simpanDenda" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticDenda" class="col-sm-2 col-form-label">Denda</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nominal_denda" id="nom_denda"
                                        placeholder="Masukan nominal denda" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticSTS" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                            id="customRadio1" value="A" required>
                                        <label class="custom-control-label" for="customRadio1">Aktif</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="status"
                                            id="customRadio2" value="N" required>
                                        <label class="custom-control-label" for="customRadio2">Non-Aktif</label>
                                    </div>
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
            location.href = "{{ url('denda/masterdenda') }}";
        }
    </script>
@endsection
