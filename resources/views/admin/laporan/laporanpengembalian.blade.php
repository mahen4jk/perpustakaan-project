@extends('layout.dashboard.app')

@section('title')
    {{ 'Laporan | Pengembalian' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Pengembalian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Pengembalian</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Laporan Pengembalian Buku</h5>
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
                        {{-- Chart --}}
                        <div class="row">
                            @if (!isset($selectedTahunKembali))
                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <h3 class="card-title">Total Pengembalian Selama 7 Hari</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="chKembali"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                            <!-- /.d-flex -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Jumlah Status Pengembalian</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="stsKembali"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.d-flex -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        {{-- Filter --}}
                        <div class="row">
                            <form action="{{ url('laporan/pengembalian/filter') }}" method="GET">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="tahun_kembali">Tahun Ajaran:&nbsp;</label>
                                        <select id="tahun_kembali" name="tahun_kembali" class="form-control">
                                            @foreach ($tahunKembali as $tK)
                                                <option value="{{ $tK }}"
                                                    {{ isset($selectedTahunKembali) && $selectedTahunKembali == $tK ? 'selected' : '' }}>
                                                    {{ $tK }}
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

                        {{-- Preview & Cetak Laporan --}}
                        <div class="row">
                            @if (isset($selectedTahunKembali) && $selectedTahunKembali)
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewKembali') }}?tahun_kembali={{ urlencode($selectedTahunKembali) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Preview Cetak
                                        Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakKembali') }}?tahun_kembali={{ urlencode($selectedTahunKembali) }}"
                                        target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak
                                        Laporan</a>
                                </div>
                            @else
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewKembali') }}" target="_blank" class="btn btn-default"><i
                                            class="fa fa-print"></i> Preview Cetak Laporan</a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakKembali') }}" target="_blank" class="btn btn-default"><i
                                            class="fa fa-print"></i> Cetak Laporan</a>
                                </div>
                            @endif
                        </div>

                        {{-- Tabel --}}
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Kode Kembali</th>
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
                                    @foreach ($reports ?? $kembali as $pengembalian)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $pengembalian->kode_kembali }}</td>
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
                                                @if ($pengembalian->status == 'terlambat')
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
                                        <th style="width:1px; white-space:nowrap;">Kode Kembali</th>
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

        $(function() {
            $(document).ready(function() {
                // Ambil data dari Blade
                var dates = @json($dates);
                var totals = @json($totals);

                // console.log('Dates:', dates); // Debug output
                // console.log('Totals:', totals); // Debug output

                const ctx = document.getElementById('chKembali').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // Tipe chart
                    data: {
                        labels: dates, // Label untuk sumbu X
                        datasets: [{
                            label: 'Total Pengembali',
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

            $(document).ready(function() {
                var stsKembali = @json($chStatus);

                var labels = Object.keys(stsKembali);
                var data = Object.values(stsKembali);

                const ctx = document.getElementById('stsKembali').getContext('2d');
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
