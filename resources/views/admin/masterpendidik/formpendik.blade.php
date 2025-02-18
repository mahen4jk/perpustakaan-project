@extends('layout.dashboard.app')

@section('title')
    {{ 'Form Pendidik' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Data Pendidik dan Tendik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('pendik/masterpendik') }}">Master Pendik</a></li>
                        <li class="breadcrumb-item active">Form Pendik</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i>&nbsp;Tambah Pendik</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="simpanPendik" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticKdBUKU" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nip" id="NIP"
                                        placeholder="Masukan Nomor Induk Pegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticISBN" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_pendik" id="nm_lengkap"
                                        placeholder="Masukan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticJudul" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="j_kelamin"
                                            id="customRadio1" value="L" required>
                                        <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="j_kelamin"
                                            id="customRadio2" value="P" required>
                                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticPengarang" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                    <select class="form-control kelas" name="roles" required>
                                        <option style="display:none"></option>
                                        <option value="kep_sek">Kepala Sekolah</option>
                                        <option value="kep_perpus">Kepala Perpustakaan</option>
                                        <option value="tu">Tata Usaha</option>
                                        <option value="guru">Guru</option>
                                        <option value="pustaka">Pustakawan</option>
                                        <option value="karyawan">Karyawan</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticISBN" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticISBN" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukan Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Foto Profil</label>
                                <div class="col-sm-10">
                                    <input type="file" id="image-input" name="avatar" class="form-control-file border"
                                        onchange="previewImage(event)">
                                    </br>
                                    <img id="preview-image" src="{{ asset('image/no-image.png') }}" class="card-img-top"
                                        alt="Preview Image" style="max-width: 200px; max-height: 200px">
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
            location.href = "{{ url('pendik/masterpendik') }}";
        }

        $(document).ready(function() {
            //select-option kelas
            $('.kelas').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Roles",
                allowClear: true
            });
        })

        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
