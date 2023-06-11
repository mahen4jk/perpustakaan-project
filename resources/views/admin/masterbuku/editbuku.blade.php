@extends('layout.dashboard.admin.app')

@section('title')
    {{ 'Form Buku' }}
@endsection

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
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('masterbuku') }}">Master Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
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
                        <form action="updateBUKU" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @foreach ($kode as $BUKU)
                                <div class="form-group row">
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">Kode Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id_buku" id="id_buku"
                                            placeholder="" value="{{ $BUKU->id_buku }}" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">ISBN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ISBN" id="ISBN"
                                            value="{{ $BUKU->isbn }}" placeholder="Masukan koden ISBN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJudul" class="col-sm-2 col-form-label">Judul Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul" id="judul"
                                            value="{{ $BUKU->judul }}" placeholder="Judul Buku" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pengarang" id="pengarang"
                                            value="{{ $BUKU->pengarang }}" placeholder="Pengarang Buku" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penerbit_id" class="col-sm-2 col-form-label">Penerbit</label>
                                    <div class="col-sm-10">
                                        <select class="form-control penerbit" name="penerbit_id" required>
                                            <option style="display:none"></option>
                                            @foreach ($penerbit as $PEN)
                                                <option value="{{ $PEN->id_penerbit }}"
                                                    {{ $BUKU->penerbit_id == $PEN->id_penerbit ? 'selected' : '' }}>
                                                    {{ $PEN->nama_penerbit }}</option>
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
                                                <option value="{{ $class->id_class }}"
                                                    {{ $BUKU->class_id == $class->id_class ? 'selected' : '' }}>
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
                                                <option value="{{ $KAT->id_kategori }}"
                                                    {{ $BUKU->kategori_id == $KAT->id_kategori ? 'selected' : '' }}>
                                                    {{ $KAT->kode_kategori }}&nbsp;-&nbsp;{{ $KAT->kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="thn_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-10 input-group date dateBuku">
                                        <input type="text" class="form-control" name="tahun_terbit"
                                            value="{{ $BUKU->tahun_terbit }}" placeholder="Tahun Terbit Buku">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Stock Buku" class="col-sm-2 col-form-label">Stock Buku</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="stok_buku" id="stok"
                                            value="{{ $BUKU->stok_buku }}" placeholder="Stock Buku" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Sinopsis</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="deskripsi" id="sinopsis" placeholder="Sinopsis Buku">{{ $BUKU->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Cover</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="file" id="image-input" name="cover"
                                        class="form-control" onchange="previewImage(event)"> --}}
                                        <input type="file" id="image-input" name="cover" class="form-control"
                                            onchange="previewImage(event)">
                                        </br>
                                        @if ($BUKU->cover)
                                            <img id="preview-image" src="{{ asset('image/buku/' . $BUKU->cover) }}"
                                                alt="Cover Buku" class="card-img-top" alt="Preview Image"
                                                style="max-width: 200px; max-height: 200px">
                                        @else
                                            <img id="preview-image" src="{{ asset('image/no-image.png') }}"
                                                alt="No Image" class="card-img-top" alt="Preview Image"
                                                style="max-width: 200px; max-height: 200px">
                                        @endif
                                        {{-- <img id="preview-image" src="{{ asset('image/no-image.png') }}"
                                            class="card-img-top" alt="Preview Image"
                                            style="max-width: 200px; max-height: 200px"> --}}
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
            location.href = "{{ url('buku/masterbuku') }}";
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
