@extends('Layout.Dashboard.app')

@section('title')
    {{ 'Dashboard' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Utama</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            {{-- <h3>{{ number_format($buku) }}</h3> --}}
                            <h3>{{ $Buku->count() }}</h3>
                            <p>Jumlah Buku</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <a href="{{ url('buku/masterbuku') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>{{ number_format($anggota) }}</h3> --}}
                            <h3>{{ $Anggota->count() }}</h3>
                            <p>Jumlah Anggota</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <a href="{{ url('anggota/masteranggota') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            {{-- <h3>{{ number_format($anggota) }}</h3> --}}
                            <h3>{{ $kunjungan->count() }}</h3>
                            <p>Pengunjung Perpustakaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-chart-pie"></i>
                        </div>
                        <a href="{{ url('laporan/kunjungan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            {{-- <h3>{{ number_format($anggota) }}</h3> --}}
                            <h3>{{ $pinjam->count() }}</h3>
                            <p>Jumlah Peminjaman</p>
                        </div>
                        <div class="icon">
                            <i class="fa-regular fa-book-open-reader"></i>
                        </div>
                        <a href="{{ url('sirkulasi/peminjaman') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.row -->
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
            <div class="row">
                <!-- /.row -->
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Buku yang sering dipinjam</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <canvas id="myChart"
                                    style="min-height: 250px; height: 360px;
                                    max-height: 360px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header border-0">
                            <h5 class="card-title">Kalender</h5>
                        </div>
                        <div class="card-body">
                            <div id="calendar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('js')
    <script>
        //Calendar
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'Asia/Jakarta',
                locale: 'id',
                initialView: 'dayGridMonth',
                contentHeight: '360px',
                themeSystem: 'bootstrap',
            });
            calendar.render();
        });

        $(function() {
            //Chart Kunjungan
            $(document).ready(function() {
                // Ambil data dari Blade
                var dates = @json($dates);
                var totals = @json($totals);

                console.log('Dates:', dates); // Debug output
                console.log('Totals:', totals); // Debug output

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

            //Chart Peminjaman
            $(document).ready(function() {
                var Peminjaman = @json($Peminjaman);

                var labels = Object.keys(Peminjaman);
                var data = Object.values(Peminjaman);

                const ctx = document.getElementById('myChart').getContext('2d');
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
                                    position: 'bottom',
                                }
                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection
