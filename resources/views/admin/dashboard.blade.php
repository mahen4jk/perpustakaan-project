@extends('admin.template')

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
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Pengunjung Perpustakaan</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                            <h3 class="card-title">Donut Chart</h3>
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
            // var ctx = $('#myChart').get(0).getContext('2d');

            //Chart
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
