@extends('layout.dashboard.app')

@section('title')
    {{ 'Laporan | Buku' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Buku</li>
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
            <div class="col-lg-auto">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0 bi"> <i class="fa-solid fa-book"></i> Laporan Buku</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ url('laporan/buku/filter') }}" method="GET">
                                <div class="form-row">
                                    <div class="form-group col-auto">
                                        <label for="tahun_input">Tahun Input:&nbsp;</label>
                                        <select id="tahun_input" name="tahun_input" class="form-control">
                                            @foreach ($tahunInput as $ti)
                                                <option value="{{ $ti }}"
                                                    {{ isset($selectedTahunInput) && $selectedTahunInput == $ti ? 'selected' : '' }}>
                                                    {{ $ti }}
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
                            @if (isset($selectedTahunInput) && $selectedTahunInput)
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewBUKU') }}?tahun_input={{ urlencode($selectedTahunInput) }}"
                                        target="_blank" class="btn btn-primary">
                                        <i class="fa fa-print"></i> Preview Cetak Laporan
                                    </a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakLaporanBK') }}?tahun_input={{ urlencode($selectedTahunInput) }}"
                                        target="_blank" class="btn btn-primary">
                                        <i class="fa fa-print"></i> Cetak Laporan
                                    </a>
                                </div>
                            @else
                                <div class="mb-3">
                                    <a href="{{ url('laporan/viewBUKU') }}" target="_blank" class="btn btn-primary">
                                        <i class="fa fa-print"></i> Preview Cetak Laporan
                                    </a>
                                </div>
                                &nbsp;
                                <div class="mb-3">
                                    <a href="{{ url('laporan/cetakLaporanBK') }}" target="_blank" class="btn btn-primary">
                                        <i class="fa fa-print"></i> Cetak Laporan
                                    </a>
                                </div>
                            @endif
                        </div>

                        <table id="example2" class="table table-hover table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kode Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Cover</th>
                                    <th style="width:1px; white-space:nowrap;">Jumlah Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Sisa Exemplar</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($reports ?? $buku as $katalog)
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>{{ $katalog->id_buku }}</td>
                                        <td>{{ $katalog->judul }}</td>
                                        <td>
                                            @if ($katalog->cover)
                                                <img src="{{ asset('image/buku/' . $katalog->cover) }}"
                                                    class="img-thumbnail" style="max-width: 100px; max-height: 100px"
                                                    alt="Cover Buku">
                                            @else
                                                <img src="{{ asset('image/no-image.png') }}" alt="No Image"
                                                    class="img-thumbnail" style="max-width: 100px; max-height: 100px">
                                            @endif
                                        </td>
                                        <td>{{ $katalog->stok_buku }}</td>
                                        <td>{{ $katalog->sisa_exemplar }}</td>
                                        <td>
                                            <a id="detail-buku" class="btn btn-default btn-sm" data-toggle="modal"
                                                data-target="#modal-detail-buku" data-judul="{{ $katalog->judul }}"
                                                data-isbn="{{ $katalog->isbn }}" data-jilid="{{ $katalog->jilid }}"
                                                data-pengarang="{{ $katalog->pengarang }}"
                                                data-klasifikasi="{{ $katalog->klasifikasi->kode_class }}"
                                                data-tmp_terbit="{{ $katalog->tmp_terbit }}"
                                                data-penerbit="{{ $katalog->penerbit }}"
                                                data-tahun_terbit="{{ $katalog->tahun_terbit }}"
                                                data-stok_buku="{{ $katalog->stok_buku }}"
                                                data-sisa_exemplar="{{ $katalog->sisa_exemplar }}"
                                                data-deskripsi="{{ $katalog->deskripsi }}">
                                                <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                            </a>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                <th style="width:1px; white-space:nowrap;">Kode Buku</th>
                                <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                <th style="width:1px; white-space:nowrap;">Cover</th>
                                <th style="width:1px; white-space:nowrap;">Jumlah Buku</th>
                                <th style="width:1px; white-space:nowrap;">Sisa Exemplar</th>
                                <th style="width:1px; white-space:nowrap;">Actions</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal fade" id="modal-detail-buku">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Buku Detail</h4>
                                    <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body tabble-responsive">
                                    <table class="table table-bordered no-margin">
                                        <tbody>
                                            <tr>
                                                <th style="">Judul</th>
                                                <td><span id="judul"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Pengarang</th>
                                                <td><span id="pengarang"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Jilid</th>
                                                <td><span id="jilid"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">ISBN</th>
                                                <td><span id="isbn"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Penerbit</th>
                                                <td><span id="penerbit"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Class</th>
                                                <td><span id="klasifikasi"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Tempat Terbit</th>
                                                <td><span id="tmp_terbit"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Tahun Terbit</th>
                                                <td><span id="tahun_terbit"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Stok</th>
                                                <td><span id="stok_buku"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Status</th>
                                                <td><span id="sisa_exemplar"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Deskripsi</th>
                                                <td><span id="deskripsi"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            //Modal Detail Buku
            $(document).on('click', '#detail-buku', function() {
                // var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                var isbn = $(this).data('isbn');
                var jilid = $(this).data('jilid');
                var pengarang = $(this).data('pengarang');
                var klasifikasi = $(this).data('klasifikasi');
                var tmp_terbit = $(this).data('tmp_terbit');
                var penerbit = $(this).data('penerbit');
                var tahun_terbit = $(this).data('tahun_terbit');
                var stok_buku = $(this).data('stok_buku');
                var sisa_exemplar = $(this).data('sisa_exemplar');
                var deskripsi = $(this).data('deskripsi');
                // $('#id_buku').text(id_buku);
                $('#judul').text(judul);
                $('#isbn').text(isbn);
                $('#jilid').text(jilid);
                $('#pengarang').text(pengarang);
                $('#klasifikasi').text(klasifikasi);
                $('#tmp_terbit').text(tmp_terbit);
                $('#penerbit').text(penerbit);
                $('#tahun_terbit').text(tahun_terbit);
                $('#stok_buku').text(stok_buku);
                $('#sisa_exemplar').text(sisa_exemplar);
                $('#deskripsi').text(deskripsi);
            })
            // Tabel
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
