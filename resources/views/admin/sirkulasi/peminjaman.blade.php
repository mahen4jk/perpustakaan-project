@extends('layout.dashboard.app')

@section('title')
    {{ 'Sirkulasi | Peminjaman' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Sirkulasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    {{-- isi content --}}
    <style>
        /* primary button */
        .btn-primary {
            background-color: #FFF;
            color: #285e8e;
            border-color: #3276b1;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #3276b1;
            color: #FFF;
            border-color: #285e8e;
        }

        /* info button */
        .btn-info {
            background-color: #FFF;
            color: #269abc;
            border-color: #39b3d7;
        }

        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active {
            background-color: #39b3d7;
            color: #FFF;
            border-color: #269abc;
        }
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-auto">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Daftar Peminjaman Buku</h5>
                        <br />
                        <td>
                            <a href="{{ url('sirkulasi/peminjaman') }}"
                                class="btn btn-primary {{ Request()->is('sirkulasi/peminjaman') ? 'active' : null }}"
                                role="button"><i class="fa-regular fa-circle-up"></i>&nbsp;Data Peminjaman</a>
                            <a href="{{ url('sirkulasi/pengembalian') }}"
                                class="btn btn-info {{ Request()->is('sirkulasi/pengembalian') ? 'active' : null }}"
                                role="button"><i class="fa-regular fa-circle-down"></i>&nbsp;Data Pengembalian</a>
                        </td>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('sirkulasi/formpinjam') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Peminjaman</a>
                        <div class="row">
                            <div class="col-lg-7">
                                <br />
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Kode Pinjam</th>
                                        <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Pinjam</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Kembali</th>
                                        <th style="width:1px; white-space:nowrap;">Status</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($Peminjaman as $pinjam)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $pinjam->kode_pinjam }}</td>
                                            <td>{{ $pinjam->Anggota->nama_anggota }}</td>
                                            <td>{{ $pinjam->tgl_pinjam }}</td>
                                            <td>{{ $pinjam->tgl_kembali }}</td>
                                            <td>
                                                @if ($pinjam->status == 'Kembali')
                                                    <label class="badge badge-success">Kembali</label>
                                                @else
                                                    <label class="badge badge-warning">Pinjam</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a id="detail-pinjam" class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#modal-detail-pinjam"
                                                    {{-- data-kode_pinjam="{{ $pinjam->kode_pinjam }}" --}}
                                                    data-id_buku="{{ $pinjam->buku_id }}"
                                                    data-judul="{{ $pinjam->Buku->judul }}">
                                                    <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                                </a>
                                                {{-- @if ($pinjam->tgl_kembali <= Carbon\Carbon::today())
                                                    @if ($pinjam->status != 'Kembali')
                                                        <a href="pengembalian/{{ $pinjam->kode_pinjam }}"
                                                            class="btn btn-warning btn-sm" role="button">
                                                            <i class="fa fa-share"></i>&nbsp;Kembalikan</button>
                                                        </a>
                                                    @else
                                                        <a href="pengembalian/{{ $pinjam->kode_pinjam }}"
                                                            class="btn btn-warning btn-sm" role="button" hidden>
                                                            <i class="fa fa-share"></i>&nbsp;Kembalikan/button>
                                                        </a>
                                                    @endif
                                                @endif --}}
                                                @if ($pinjam->status != 'Kembali')
                                                    <a href="pengembalian/{{ $pinjam->kode_pinjam }}"
                                                        class="btn btn-warning btn-sm" role="button">
                                                        <i class="fa fa-share"></i>&nbsp;Kembalikan</button>
                                                    </a>
                                                @else
                                                    <a href="pengembalian/{{ $pinjam->kode_pinjam }}"
                                                        class="btn btn-warning btn-sm" role="button" hidden>
                                                        <i class="fa fa-share"></i>&nbsp;Kembalikan/button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kode Pinjam</th>
                                    <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                    <th style="width:1px; white-space:nowrap;">Tanggal Pinjam</th>
                                    <th style="width:1px; white-space:nowrap;">Tanggal Kembali</th>
                                    <th style="width:1px; white-space:nowrap;">Status</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-detail-pinjam">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Detail Peminjaman</h4>
                                    <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body tabble-responsive">
                                    <table class="table table-bordered no-margin">
                                        <tbody>
                                            {{-- <tr>
                                                <th style="">Kode Pinjam</th>
                                                <td><span id="kode_pinjam"></span></td>
                                            </tr> --}}
                                            <tr>
                                                <th style="">Kode Buku</th>
                                                <td><span id="id_buku"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Judul</th>
                                                <td><span id="judul"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //Modal Detail Pinjam
            $(document).on('click', '#detail-pinjam', function() {
                // var kode_pinjam = $(this).data('kode_pinjam');
                var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                // $('#kode_pinjam').text(kode_pinjam);
                $('#id_buku').text(id_buku);
                $('#judul').text(judul);
            })
            // Tabel
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
