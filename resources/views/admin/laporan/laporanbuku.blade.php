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
                        <table id="example2" class="table table-hover table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Cover</th>
                                    <th style="width:1px; white-space:nowrap;">Stock Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Buku Tersedia</th>
                                    <th style="width:1px; white-space:nowrap;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($buku as $katalog)
                                    <tr>
                                        <td style="text-align:center"><?php echo $no++; ?></td>
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
                                                data-target="#modal-detail-buku" data-id_buku="{{ $katalog->id_buku }}"
                                                data-judul="{{ $katalog->judul }}" data-isbn="{{ $katalog->isbn }}"
                                                data-pengarang="{{ $katalog->pengarang }}"
                                                data-id_penerbit="{{ $katalog->penerbit->nama_penerbit }}"
                                                data-klasifikasi="{{ $katalog->class_id }}"data-id_kategori="{{ $katalog->kategori->kategori }}"
                                                data-tahun_terbit="{{ $katalog->tahun_terbit }}"
                                                data-deskripsi="{{ $katalog->deskripsi }}">
                                                <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                <th style="width:1px; white-space:nowrap;">Cover</th>
                                <th style="width:1px; white-space:nowrap;">Stock Buku</th>
                                <th style="width:1px; white-space:nowrap;">Buku Tersedia</th>
                                <th style="width:1px; white-space:nowrap;">Action</th>
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
                                                <th style="">Id Buku</th>
                                                <td><span id="id_buku"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Judul</th>
                                                <td><span id="judul"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">ISBN</th>
                                                <td><span id="isbn"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Pengarang</th>
                                                <td><span id="pengarang"></span></td>
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
                                                <th style="">Kategori</th>
                                                <td><span id="kategori"></span></td>
                                            </tr>
                                            <tr>
                                                <th style="">Tahun Terbit</th>
                                                <td><span id="tahun_terbit"></span></td>
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
                var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                var isbn = $(this).data('isbn');
                var pengarang = $(this).data('pengarang');
                var id_penerbit = $(this).data('id_penerbit');
                var klasifikasi = $(this).data('klasifikasi');
                var id_kategori = $(this).data('id_kategori');
                var tahun_terbit = $(this).data('tahun_terbit');
                var stok_buku = $(this).data('stok_buku');
                var deskripsi = $(this).data('deskripsi');
                $('#id_buku').text(id_buku);
                $('#judul').text(judul);
                $('#isbn').text(isbn);
                $('#pengarang').text(pengarang);
                $('#penerbit').text(id_penerbit);
                $('#klasifikasi').text(klasifikasi);
                $('#kategori').text(id_kategori);
                $('#tahun_terbit').text(tahun_terbit);
                $('#stok_buku').text(stok_buku);
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
