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
                        @if (!isset($selectedTahunAjaran))
                            <div class="row">
                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <h3 class="card-title">Total Kunjungan Selama 7 Hari</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="kunChart"
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
                                        <h3 class="card-title">Anggota Sering Berkunjung</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="agChart"
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
                                        <h3 class="card-title">Total Kelas Berkunjung</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="kelasChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.d-flex -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form action="{{ url('laporan/kunjungan/filter') }}" method="GET">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="tahun_ajaran">Tahun Ajaran:&nbsp;</label>
                                        <select id="tahun_ajaran" name="tahun_ajaran" class="form-control">
                                            @foreach ($tahunAjaran as $ta)
                                                <option value="{{ $ta }}"
                                                    {{ isset($selectedTahunAjaran) && $selectedTahunAjaran == $ta ? 'selected' : '' }}>
                                                    {{ $ta }}
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
                        <div class="row">
                            @if (isset($selectedTahunAjaran) && $selectedTahunAjaran)
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewLaporanKUN') }}?tahun_ajaran={{ urlencode($selectedTahunAjaran) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Preview Cetak
                                        Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakLaporanKUN') }}?tahun_ajaran={{ urlencode($selectedTahunAjaran) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak
                                        Laporan</a>
                                </div>
                            @else
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewLaporanKUN') }}" target="_blank"
                                        class="btn btn-default"><i class="fa fa-print"></i> Preview Cetak
                                        Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakLaporanKUN') }}" target="_blank"
                                        class="btn btn-default"><i class="fa fa-print"></i> Cetak
                                        Laporan</a>
                                </div>
                            @endif
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
                                    @forelse ($reports ?? $kunjungan as $kunjungan)
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no++; ?></td>
                                            <td>{{ $kunjungan->nis }}</td>
                                            <td>{{ $kunjungan->nama_anggota }}</td>
                                            <td>{{ $kunjungan->kelas }}</td>
                                            <td>{{ $kunjungan->tgl_kunjungan }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
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

        $(function() {
            //Chart Kunjungan
            $(document).ready(function() {
                // Ambil data dari Blade
                var dates = @json($dates);
                var totals = @json($totals);

                // console.log('Dates:', dates); // Debug output
                // console.log('Totals:', totals); // Debug output

                const ctx = document.getElementById('kunChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // Tipe chart
                    data: {
                        labels: dates, // Label untuk sumbu X
                        datasets: [{
                            label: 'Total Kunjungan',
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

            //Chart Anggota Kunjungan
            $(document).ready(function() {
                var Anggota = @json($Anggota);

                var labels = Object.keys(Anggota);
                var data = Object.values(Anggota);

                const ctx = document.getElementById('agChart').getContext('2d');
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
                                    display: true,
                                    position: 'right',
                                }
                            }
                        }
                    });
                }
            }

            //Chart Kelas Kunjungan
            $(document).ready(function() {
                var Kelas = @json($Kelas);

                var labels = Object.keys(Kelas);
                var data = Object.values(Kelas);

                const ctx = document.getElementById('kelasChart').getContext('2d');
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
                                    display: true,
                                    position: 'right'
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection
