@extends('layout.dashboard.app')

@section('title')
    {{ 'Form Anggota' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('anggota/masteranggota') }}">Master Anggota</a></li>
                        <li class="breadcrumb-item active">Form Anggota</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i>&nbsp;Tambah Anggota</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="ubahAnggota" method="POST">
                            {{ csrf_field() }}
                            @foreach ($anggota as $anggota)
                                <div class="form-group row" hidden>
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">ID Anggota</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_anggota" id="kd_anggota"
                                            placeholder="Masukan Nomor Induk Siswa" value="{{ $anggota->id_anggota }}"
                                            readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticPengarang" class="col-sm-2 col-form-label">Kelas</label>
                                    <div class="col-sm-10">
                                        <select class="form-control kelas" name="kelas_id" required>
                                            <option style="display:none"></option>
                                            @foreach ($kelas as $kelas)
                                                <option value="{{ $kelas->id_kelas }}"
                                                    {{ $anggota->kelas_id == $kelas->id_kelas ? 'selected' : '' }}>
                                                    {{ $kelas->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nis" id="NIS"
                                            placeholder="Masukan Nomor Induk Siswa" value="{{ $anggota->nis }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_anggota" id="nm_lengkap"
                                            placeholder="Masukan Nama Lengkap" value="{{ $anggota->nama_anggota }}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJudul" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="j_kelamin"
                                                id="customRadio1" value="L"
                                                {{ $anggota->j_kelamin == 'L' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="j_kelamin"
                                                id="customRadio2" value="P"
                                                {{ $anggota->j_kelamin == 'P' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
            location.href = "{{ url('anggota/masteranggota') }}";
        }
        $(document).ready(function() {
            //select-option kelas
            $('.kelas').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Kelas",
                allowClear: true
            });
        })
    </script>
@endsection
