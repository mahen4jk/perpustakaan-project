@extends('layout.dashboard.app')

@section('title')
    {{ 'Laporan | Kunjungan' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Kunjungan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kunjungan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-auto">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0 bi"> <i class="fa-solid fa-book"></i> Laporan Kunjungan</h5>
                    </div>
                    <div class="card-body">
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
                                        <th style="width:1px; white-space:nowrap;">NIS</th>
                                        <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                        <th style="width:1px; white-space:nowrap;">Kelas</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Kunjungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($kunjungan as $kunjungan)
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no++; ?></td>
                                            <td>{{ $kunjungan->nis }}</td>
                                            <td>{{ $kunjungan->nama_anggota }}</td>
                                            <td>{{ $kunjungan->kelas }}</td>
                                            <td>{{ $kunjungan->tgl_kunjungan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">NIS</th>
                                        <th style="width:1px; white-space:nowrap;">Nama Anggota</th>
                                        <th style="width:1px; white-space:nowrap;">Kelas</th>
                                        <th style="width:1px; white-space:nowrap;">Tanggal Kunjungan</th>
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
