@extends('admin.template')

@section('title')
    {{ 'Sirkulasi | Form Peminjaman' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                        <li class="breadcrumb-item active">Form Peminjaman</li>
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
                        <form action="simpanpinjam" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticKdBUKU" class="col-sm-2 col-form-label">Kode Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode_pinjam" id="kd_pinjam"
                                        placeholder="" value="{{ 'OUT-' . date('d-m-Y') . '-' . $kode_pinjam }}" required
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticISBN" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                <div class="col-sm-10 input-group date datepinjam">
                                    <input type="text" class="form-control" name="tgl_pinjam" id="tanggal_pinjam"
                                        placeholder="Tanggal Pinjam"
                                        value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"
                                        required readonly>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticJudul" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                <div class="col-sm-10 input-group date datekembali">
                                    <input type="text" class="form-control" name="tgl_kembali" id="datekembali"
                                        placeholder="Tanggal Kembali"
                                        value="{{ date('Y-m-d',strtotime(Carbon\Carbon::today()->addDay(3)->toDateString())) }}"
                                        required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticAnggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                                <div class="col-sm-10">
                                    {{-- <select class="form-control Anggota" name="nis_anggota" required>
                                        <option style="display:none"></option>
                                        @foreach ($Anggota as $anggota)
                                            <option value="{{ $anggota->nis }}"> {{ $anggota->nis }}
                                                &nbsp;{{ $anggota->nama_lengkap }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <div class="input-group">
                                        <input id="nama_anggota" type="text" class="form-control" readonly=""
                                            required>
                                        <input id="anggota_id" type="text" class="form-control" name="anggota_id"
                                            value="{{ old('anggota_id') }}" readonly="" required hidden>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal"
                                                data-target="#mdlAnggota"><b>Cari Anggota</b>
                                                <span class="fa fa-search"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticJdlBuku" class="col-sm-2 col-form-label">Judul Buku</label>
                                <div class="col-sm-10">
                                    {{-- <select class="form-control Buku" name="buku_id" required>
                                        <option style="display:none"></option>
                                        @foreach ($Buku as $buku)
                                            <option value="{{ $buku->id_buku }}"> {{ $buku->id_buku }}
                                                &nbsp;{{ $buku->judul }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <div class="input-group">
                                        <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                        <input id="buku_id" type="text" class="form-control" name="buku_id"
                                            value="{{ old('buku_id') }}" readonly="" required hidden>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal"
                                                data-target="#mdlBuku"><b>Cari Buku</b>
                                                <span class="fa fa-search"></span></button>
                                        </span>
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
            <!-- MODAL Anggota-->
            <div class="modal fade bd-example-modal-lg" id="mdlAnggota">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cari Anggota</h4>
                            <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body tabble-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dtMdlAnggota">
                                <thead>
                                    <tr>
                                        <th style="">NIS</th>
                                        <th style="">Nama Anggota</th>
                                        <th style="">Jenis Kelamin</th>
                                        <th style="">Kelas</th>
                                        <th style="">No. Handphone</th>
                                        <th style="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Anggota as $anggota)
                                        @if ($anggota->status != 'Tdk_Aktif')
                                            <tr>
                                                <td>{{ $anggota->nis }}</td>
                                                <td>{{ $anggota->nama_anggota }}</td>
                                                <td>{{ $anggota->j_kelamin }}</td>
                                                <td>{{ $anggota->kelas->kelas }}</td>
                                                <td>{{ $anggota->hp }}</td>
                                                <td><button class="pilih_anggota btn btn-warning btn-secondary"
                                                        data-anggota_id="<?php echo $anggota->id_anggota; ?>"
                                                        data-nama_anggota="<?php echo $anggota->nama_anggota; ?>">Pilih&nbsp;<span
                                                            class="fa-solid fa-plus"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL Buku-->
            <div class="modal fade bd-example-modal-lg" id="mdlBuku">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cari Buku</h4>
                            <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body tabble-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dtMdlBuku">
                                <thead>
                                    <tr>
                                        <th style="">Kode</th>
                                        <th style="">Judul</th>
                                        <th style="">ISBN</th>
                                        <th style="">Pengarang</th>
                                        <th style="">Stok Buku</th>
                                        <th style="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Buku as $buku)
                                        <tr>
                                            <td>{{ $buku->id_buku }}</td>
                                            <td>{{ $buku->judul }}</td>
                                            <td>{{ $buku->isbn }}</td>
                                            <td>{{ $buku->pengarang }}</td>
                                            <td>{{ $buku->stok_buku }}</td>
                                            <td><button class="pilih_buku btn btn-default"
                                                    data-buku_id="<?php echo $buku->id_buku; ?>"
                                                    data-buku_judul="<?php echo $buku->judul; ?>">Pilih&nbsp;<span
                                                        class="fa-solid fa-plus"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function kembali() {
            location.href = "{{ url('sirkulasi/peminjaman') }}";
        }

        $(document).on('click', ".pilih_anggota", function(e) {
            document.getElementById("nama_anggota").value = $(this).attr('data-nama_anggota');
            document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
            $('#mdlAnggota').modal('hide');
        });

        $(document).on('click', ".pilih_buku", function(e) {
            document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
            document.getElementById("buku_id").value = $(this).attr('data-buku_id');
            $('#mdlBuku').modal('hide');
        });

        $(document).ready(function() {
            // //select-option Anggota
            // $('.Anggota').select2({
            //     theme: 'bootstrap4',
            //     placeholder: "Pilih Anggota",
            //     allowClear: true
            // });
            // $('.Buku').select2({
            //     theme: 'bootstrap4',
            //     placeholder: "Judul Buku Yang Dipinjam",
            //     allowClear: true
            // });

            $('#dtMdlAnggota').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $('#dtMdlBuku').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            // $('.datekembali').off('focus').datepicker({
            //     format: "dd-mm-yyyy",
            //     daysOfWeekDisabled: [0]
            // }).click(
            //     function() {
            //         $(this).datepicker('show');
            //     }
            // );
            $('.datekembali').off('focus').datepicker({
                format: "yyyy-mm-dd",
                daysOfWeekDisabled: [0],
            }).click(
                function() {
                    $(this).datepicker('show');
                }
            );
        })
    </script>
@endsection
