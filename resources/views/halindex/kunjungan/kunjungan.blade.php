@extends('Layout.Home.app')

@section('title')
    {{ 'Kunjungan' }}
@endsection

@section('style')
@endsection


@section('jumbotron')
    <div class="jumbotron jumbotron-fluid jmb-katalog">
        <div class="container">
            <h1 class="display-4">Kunjungan</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="margin-top: 5px">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kunjungan</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <hr style="margin-top: -15px; border: 1px solid lightgrey;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <form action="{{ route('kunjungan') }}" method="POST">
                        @csrf
                        <div class="form-row align-items-center">
                            <div class="col-auto inHidden">
                                <label class="sr-only" for="inlineFormInput">ID Anggota</label>
                                <input type="input" class="form-control mb-2" name="anggota_id" id="anggota_id"
                                    placeholder="Anggota ID" readonly>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">NIS</label>
                                <input type="text" class="form-control mb-2" name="nis" id="nis"
                                    placeholder="NIS" readonly>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Nama</label>
                                <input type="text" class="form-control mb-2" name="nama_anggota" id="nama_anggota"
                                    placeholder="Nama" readonly>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Kelas</label>
                                <input type="text" class="form-control mb-2" name="kelas" id="kelas_id"
                                    placeholder="Kelas" readonly>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-info btn-primary mb-2" data-toggle="modal"
                                    data-target="#mdlAnggota">
                                    <i class="fa-regular fa-magnifying-glass"></i>&nbsp;Cari</button>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="simpan" class="btn btn-success mb-2"><i
                                        class="fa-regular fa-floppy-disk"></i>&nbsp;Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12 mt-3">
                    <div class="row">
                        <table class="table table-hover table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $noIterasi = 1;
                                @endphp
                                @foreach ($kunjungan as $kunjungan)
                                    <tr>
                                        <td>{{ $noIterasi }}</td>
                                        <td>{{ $kunjungan->nis }}</td>
                                        <td>{{ $kunjungan->nama_anggota }}</td>
                                        <td>{{ $kunjungan->kelas }}</td>
                                        <td>{{ $kunjungan->tgl_kunjungan }}</td>
                                    </tr>
                                    @php
                                        $noIterasi++;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    {{ $kunPaginator->links() }}
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
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
                                    <th style="">No</th>
                                    <th style="">NIS</th>
                                    <th style="">Nama Anggota</th>
                                    <th style="">Kelas</th>
                                    <th style="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nomorIterasi = 1;
                                @endphp

                                @foreach ($Anggota as $anggota)
                                    @if ($anggota->status != 'Tdk_Aktif')
                                        <tr>
                                            <td>{{ $nomorIterasi }}</td>
                                            <td>{{ $anggota->nis }}</td>
                                            <td>{{ $anggota->nama_anggota }}</td>
                                            <td>{{ $anggota->kelas->kelas }}</td>
                                            <td>
                                                <button class="pilih_anggota btn btn-warning btn-secondary"
                                                    data-anggota_id="<?php echo $anggota->id_anggota; ?>" data-nis="<?php echo $anggota->nis; ?>"
                                                    data-nama_anggota="<?php echo $anggota->nama_anggota; ?>"
                                                    data-kelas_id="<?php echo $anggota->kelas->kelas; ?>">Pilih&nbsp;<span
                                                        class="fa-solid fa-plus"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $nomorIterasi++;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $(document).on('click', ".pilih_anggota", function(e) {
            document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
            document.getElementById("nis").value = $(this).attr('data-nis');
            document.getElementById("nama_anggota").value = $(this).attr('data-nama_anggota');
            document.getElementById("kelas_id").value = $(this).attr('data-kelas_id');
            $('#mdlAnggota').modal('hide');
        });

        // $(document).on('click', ".pilih_anggota", function(e) {
        //     var kelasId = $(this).attr('data-kelas_id');
        //     var namaAnggota = $(this).attr('data-nama_anggota');
        //     var nis = $(this).attr('data-nis');

        //     // Kirim permintaan AJAX untuk mendapatkan nama kelas berdasarkan kelas_id
        //     $.ajax({
        //         type: 'GET',
        //         url: '/get-nama-kelas/' + kelasId,
        //         success: function(response) {
        //             // Update nilai input dengan data yang diterima
        //             document.getElementById("nama_anggota").value = namaAnggota;
        //             document.getElementById("nis").value = nis;
        //             document.getElementById("nama_kelas").value = response.nama_kelas;
        //             $('#mdlAnggota').modal('hide');
        //         },
        //         error: function(xhr, status, error) {
        //             // Tangani kesalahan jika diperlukan
        //         }
        //     });
        // });
    </script>
@endsection
