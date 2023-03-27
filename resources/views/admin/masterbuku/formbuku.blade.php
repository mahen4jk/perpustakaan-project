@extends('admin.template')

@section('title')
    {{ 'Form Buku' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Buku</h1>
                    <p>Menambahkan data buku perpustakaan</p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('buku/masterbuku') }}">Master Buku</a></li>
                        <li class="breadcrumb-item active">Form Buku</li>
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
                        <form action="simpanBUKU" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row" hidden>
                                <label for="staticKdBUKU" class="col-sm-2 col-form-label">Kode Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder=""
                                        value="{{ $id_buku }}" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticISBN" class="col-sm-2 col-form-label">ISBN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ISBN" id="ISBN"
                                        placeholder="Masukan koden ISBN" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticJudul" class="col-sm-2 col-form-label">Judul Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul" id="judul"
                                        placeholder="Judul Buku" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pengarang" id="pengarang"
                                        placeholder="Pengarang Buku" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="penerbit_id" class="col-sm-2 col-form-label">Penerbit</label>
                                <div class="col-sm-10">
                                    <select class="form-control penerbit" name="penerbit_id" required>
                                        <option style="display:none"></option>
                                        @foreach ($penerbit as $PEN)
                                            <option value="{{ $PEN->id_penerbit }}">{{ $PEN->nama_penerbit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="class_id" class="col-sm-2 col-form-label">Klasifikasi</label>
                                <div class="col-sm-10">
                                    <select class="form-control klasifikasi" name="class_id" required>
                                        <option style="display:none"></option>
                                        @foreach ($klasifikasi as $class)
                                            <option value="{{ $class->id_class }}">
                                                {{ $class->id_class }}&nbsp;{{ $class->ket }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control kategori" name="kategori_id" required>
                                        <option style="display:none"></option>
                                        @foreach ($kategori as $KAT)
                                            <option value="{{ $KAT->id_kategori }}">{{ $KAT->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="thn_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-10 input-group date dateBuku">
                                    <input type="text" class="form-control" name="tahun_terbit"
                                        placeholder="Tahun Terbit Buku">
                                    {{-- <div class="input-group-addon">
                                        <span class=""></span>
                                    </div> --}}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Stock Buku" class="col-sm-2 col-form-label">Stock Buku</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="stok_buku" id="stok"
                                        placeholder="Stock Buku" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Sinopsis</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="deskripsi" id="sinopsis" placeholder="Sinopsis Buku"></textarea>
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
            location.href = "{{ url('buku/masterbuku') }}";
        }
        $(document).ready(function() {
            //select-option klasifikasi
            $('.klasifikasi').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Klasifikasi",
                allowClear: true
            });
            //select-option kategori
            $('.kategori').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Kategori",
                allowClear: true
            });
            //select-option penerbit
            $('.penerbit').select2({
                theme: 'bootstrap4',
                placeholder: "Pilih Penerbit",
                allowClear: true
            });
            $('.dateBuku').off('focus').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            }).click(
                function() {
                    $(this).datepicker('show');
                }
            );
        })
    </script>
@endsection
