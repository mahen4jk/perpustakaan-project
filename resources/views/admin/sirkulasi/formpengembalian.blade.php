@extends('layout.dashboard.admin.app')

@section('title')
    {{ 'Sirkulasi | Form Pengembalian' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Pengembalian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengembalian</li>
                        <li class="breadcrumb-item active">Form Pengembalian</li>
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
                        <form action="kembaliBuku" method="POST">
                            {{ csrf_field() }}
                            @foreach ($Pinjam as $kembali)
                                <div class="form-group row" hidden>
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">Kode Kembali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode_kembali" id="kd_kembali"
                                            placeholder="" value="{{ 'IN-' . date('d-m-Y') . '-' . $kode_kembali }}"
                                            required readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label for="staticKdBUKU" class="col-sm-2 col-form-label">Kode Pinjam</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pinjam_kode" id="kd_pinjam"
                                            placeholder="" value="{{ $kembali->kode_pinjam }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticISBN" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                                    <div class="col-sm-10 input-group date datepinjam">
                                        <input type="text" class="form-control" id="tanggal_pinjam"
                                            placeholder="Tanggal Pinjam" value="{{ $kembali->tgl_pinjam }}" readonly
                                            disabled>
                                        {{-- <div class="input-group-prepend">
                                            <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJudul" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                                    <div class="col-sm-10 input-group date datekembali">
                                        <input type="text" class="form-control" id="datekembali"
                                            placeholder="Tanggal Kembali" value="{{ $kembali->tgl_kembali }}" readonly
                                            disabled>
                                        {{-- <div class="input-group-prepend">
                                            <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJudul" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                                    <div class="col-sm-10 input-group date datepengembalian">
                                        <input type="text" class="form-control" name="tgl_dikembalikan"
                                            id="datepengembalian" placeholder="Tanggal Kembali" value="" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text btn"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticAnggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            @foreach ($Anggota as $kembali1)
                                                @if (strval($kembali1->id_anggota) == $kembali->anggota_id)
                                                    <input id="nama_anggota" type="text" class="form-control"
                                                        readonly="" value="{{ $kembali1->nama_anggota }}">
                                                    <input id="anggota_id" type="text" class="form-control"
                                                        value="{{ $kembali->anggota_id }}" readonly="" hidden>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticJdlBuku" class="col-sm-2 col-form-label">Judul Buku</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            @foreach ($Buku as $kembali2)
                                                @if (strval($kembali2->id_buku == $kembali->buku_id))
                                                    <input id="buku_judul" type="text" class="form-control"
                                                        readonly="" value="{{ $kembali2->judul }}">
                                                    <input id="buku_id" type="text" class="form-control"
                                                        name="buku_id" value="{{ $kembali->buku_id }}" readonly="" hidden>
                                                @endif
                                            @endforeach
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
            location.href = "{{ url('sirkulasi/peminjaman') }}";
        }

        $(document).ready(function() {

            // $('.datekembali').off('focus').datepicker({
            //     format: "dd-mm-yyyy",
            //     daysOfWeekDisabled: [0]
            // }).click(
            //     function() {
            //         $(this).datepicker('show');
            //     }
            // );
            // $('.datekembali').off('focus').datepicker({
            //     format: "yyyy-mm-dd",
            //     daysOfWeekDisabled: [0],
            //     toggleActive: "false",
            // }).click(
            //     function() {
            //         $(this).datepicker('show');
            //     }
            // );
            $('.datepengembalian').off('focus').datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: "true",
                daysOfWeekDisabled: [0],
            }).click(
                function() {
                    $(this).datepicker('show');
                }
            );
        })
    </script>
@endsection
