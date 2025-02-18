@extends('layout.dashboard.app')

@section('title')
    {{ 'Laporan | Peminjaman' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Peminjaman</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i>Laporan Peminjaman Buku</h5>
                        <br />
                        <td>
                            <a href="{{ url('laporan/peminjaman') }}"
                                class="btn btn-primary {{ Request()->is('laporan/peminjaman') || Request()->has('tahun_pinjam') ? 'active' : null }}"
                                role="button"><i class="fa-regular fa-circle-up"></i>&nbsp;Laporan Peminjaman</a>
                            <a href="{{ url('laporan/pengembalian') }}"
                                class="btn btn-info {{ Request()->is('laporan/pengembalian') || Request()->has('tahun_kembali') ? 'active' : null }}"
                                role="button"><i class="fa-regular fa-circle-down"></i>&nbsp;Laporan Pengembalian</a>
                        </td>
                    </div>
                    <div class="card-body">
                        {{-- CHART --}}
                        @if (!isset($selectedTahunPinjam))
                            <div class="row">
                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <h3 class="card-title">Total Peminjaman Selama 7 Hari</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="chPinjam"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                            <!-- /.d-flex -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Buku yang sering dipinjam</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="bukuPinjam"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.d-flex -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Anggota yang sering pinjam</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="anggotaPinjam"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.d-flex -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>

                        {{-- Filter Pinjam --}}
                        <div class="row">
                            <form action="{{ url('laporan/peminjaman/filter') }}" method="GET">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="tahun_pinjam">Tahun Ajaran:&nbsp;</label>
                                        <select id="tahun_pinjam" name="tahun_pinjam" class="form-control">
                                            @foreach ($tahunPinjam as $tP)
                                                <option value="{{ $tP }}"
                                                    {{ isset($selectedTahunPinjam) && $selectedTahunPinjam == $tP ? 'selected' : '' }}>
                                                    {{ $tP }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-auto">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary form-control">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- CETAK LAPORAN --}}
                        <div class="row">
                            @if (isset($selectedTahunPinjam) && $selectedTahunPinjam)
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewPinjam') }}?tahun_pinjam={{ urlencode($selectedTahunPinjam) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Preview Cetak
                                        Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakPinjam') }}?tahun_pinjam={{ urlencode($selectedTahunPinjam) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak
                                        Laporan</a>
                                </div>
                            @else
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewPinjam') }}" target="_blank" class="btn btn-default"><i
                                            class="fa fa-print"></i> Preview Cetak Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakPinjam') }}" target="_blank" class="btn btn-default"><i
                                            class="fa fa-print"></i> Cetak Laporan</a>
                                </div>
                            @endif
                        </div>


                        {{-- TAMPILAN TABEL --}}
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
                                    @foreach ($reports ?? $peminjaman as $pinjam)
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
                                                    data-kode_pinjam="{{ $pinjam->kode_pinjam }}"
                                                    data-id_buku="{{ $pinjam->buku_id }}"
                                                    data-judul="{{ $pinjam->Buku->judul }}">
                                                    <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                                </a>
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
                                            <tr>
                                                <th style="">Kode Pinjam</th>
                                                <td><span id="kode_pinjam"></span></td>
                                            </tr>
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
                var kode_pinjam = $(this).data('kode_pinjam');
                var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                $('#kode_pinjam').text(kode_pinjam);
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

        $(function() {
            $(document).ready(function() {
                // Ambil data dari Blade
                var dates = @json($dates);
                var totals = @json($totals);

                // console.log('Dates:', dates); // Debug output
                // console.log('Totals:', totals); // Debug output

                const ctx = document.getElementById('chPinjam').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // Tipe chart
                    data: {
                        labels: dates, // Label untuk sumbu X
                        datasets: [{
                            label: 'Total Peminjam',
                            data: totals, // Data untuk sumbu Y
                            borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area di bawah garis
                            borderWidth: 1,
                            fill: true // Mengisi area di bawah garis
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Tanggal'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Jumlah Kunjungan'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return `Total Kunjungan: ${tooltipItem.raw}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
            //Chart Peminjaman
            $(document).ready(function() {
                var peminjaman = @json($chartPinjam);

                var labels = Object.keys(peminjaman);
                var data = Object.values(peminjaman);

                const ctx = document.getElementById('bukuPinjam').getContext('2d');
                sampleChartClass.ChartData(ctx, labels, data);
            });

            sampleChartClass = {
                ChartData: function(ctx, labels, data) {
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah',
                                data: data,
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    position: 'right',
                                }
                            }
                        }
                    });
                }
            }

            //Chart Anggota
            $(document).ready(function() {
                var anggota = @json($chartAnggota);

                var labels = Object.keys(anggota);
                var data = Object.values(anggota);

                const ctx = document.getElementById('anggotaPinjam').getContext('2d');
                sampleChartClass.ChartData(ctx, labels, data);
            });

            sampleChartClass = {
                ChartData: function(ctx, labels, data) {
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah',
                                data: data,
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    position: 'right',
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection
