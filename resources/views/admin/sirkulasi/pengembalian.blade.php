@extends('layout.dashboard.app')

@section('title')
    {{ 'Sirkulasi | Pengembalian' }}
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
                        <li class="breadcrumb-item active">Pengembalian</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Daftar Pengembalian Buku</h5>
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
                                        <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Dikembalikan</th>
                                        <th style="width:1px; white-space:nowrap;">Terlambat</th>
                                        <th style="width:1px; white-space:nowrap;">Status</th>
                                        <th style="width:1px; white-space:nowrap;">Jumlah Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($kembali as $pengembalian)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                @foreach ($sirPinjam as $kembali21)
                                                    @if ($kembali21->kode_pinjam == $pengembalian->pinjam_kode)
                                                        @foreach ($Anggota as $kembali22)
                                                            @if ($kembali22->id_anggota == $kembali21->anggota_id)
                                                                {{ $kembali22->nama_anggota }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $pengembalian->tgl_dikembalikan }}</td>
                                            <td>{{ $pengembalian->terlambat }}&nbsp;Hari</td>
                                            <td>
                                                @if ($pengembalian->status == 'Terlambat')
                                                    <label class="badge badge-warning">Terlambat</label>
                                                @else
                                                    <label class="badge badge-success">Tepat Waktu</label>
                                                @endif
                                            </td>
                                            <td>{{ $pengembalian->total_denda }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Dikembalikan</th>
                                        <th style="width:1px; white-space:nowrap;">Terlambat</th>
                                        <th style="width:1px; white-space:nowrap;">Status</th>
                                        <th style="width:1px; white-space:nowrap;">Jumlah Denda</th>
                                    </tr>
                                </tfoot>
                            </table>
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
