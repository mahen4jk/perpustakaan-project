@extends('layout.dashboard.app')

@section('title')
    {{ 'Form Petugas' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('petugas/masterpetugas') }}">Master Petugas</a></li>
                        <li class="breadcrumb-item active">Edit Petugas</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-plus"></i>&nbsp;Edit Petugas</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form -->
                        <form action="ubahPetugas" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach ($petugas as $petugas)
                                <div class="form-group row" hidden>
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">Id User</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id" id="kd_petugas"
                                            placeholder="Masukan Nomor Induk Siswa" value="{{ $petugas->id }}"
                                            readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Masukan Nama Lengkap" value="{{ $petugas->name }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJudul" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="gender"
                                                id="customRadio1" value="Laki-Laki"
                                                {{ $petugas->gender == 'Laki-Laki' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="gender"
                                                id="customRadio2" value="Perempuan"
                                                {{ $petugas->gender == 'Perempuan' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticPengarang" class="col-sm-2 col-form-label">Roles</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="roles" id="roles">
                                            <option selected>--Pilih Roles--</option>
                                            <option value="admin" @if ($petugas->roles == 'admin') selected @endif>Admin
                                            </option>
                                            <option value="kep_perpus" @if ($petugas->roles == 'kep_perpus') selected @endif>
                                                Kepala Perpustakaan
                                            </option>
                                            <option value="pustakawan" @if ($petugas->roles == 'pustakawan') selected @endif>
                                                Pustakawan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="address" id="address" placeholder="Alamat Anggota">{{ $petugas->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Masukan Username" value="{{ $petugas->username }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Masukan Email" value="{{ $petugas->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Masukkan Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thn_terbit" class="col-sm-2 col-form-label">No. Handphone</label>
                                    <div class="col-sm-10 input-group">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Masukan No. Handphone" value="{{ $petugas->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="status"
                                                id="customRadio3" value="ACTiVE"
                                                {{ $petugas->status == 'ACTIVE' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio3">Aktif</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="status"
                                                id="customRadio4" value="INACTIVE"
                                                {{ $petugas->status == 'INACTIVE' ? 'checked' : '' }} required>
                                            <label class="custom-control-label" for="customRadio4">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Foto Profil</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="image-input" name="avatar"
                                            class="form-control-file border" onchange="previewImage(event)">
                                        </br>
                                        @if ($petugas->avatar)
                                            <img id="preview-image" src="{{ asset('image/user/' . $petugas->avatar) }}"
                                                alt="Cover Buku" class="card-img-top" alt="Preview Image"
                                                style="max-width: 200px; max-height: 200px">
                                        @else
                                            <img id="preview-image" src="{{ asset('image/no-image.png') }}"
                                                alt="No Image" class="card-img-top" alt="Preview Image"
                                                style="max-width: 200px; max-height: 200px">
                                        @endif
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
            location.href = "{{ url('petugas/masterpetugas') }}";
        }

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
