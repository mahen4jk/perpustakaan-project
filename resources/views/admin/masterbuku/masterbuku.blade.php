@extends('layout.dashboard.app')

@section('title')
    {{ 'Master Buku' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Buku</h1>
                    <p>Data Master Buku, menampilkan data buku perpustakaan</p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Buku</li>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-book"></i> Master Buku</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('buku/tambahbuku') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Tambah Data Buku</a>
                        <div class="row">
                            <div class="col-lg-7">
                                </br>
                            </div>
                            <div class="col-lg-5">
                            </div>
                        </div>
                        <table id="example2" class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
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
                                @foreach ($buku as $katalog)
                                    <tr>
                                        <td><?php echo $no++; ?></td>
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
                                                data-isbn="{{ $katalog->isbn }}" data-pengarang="{{ $katalog->pengarang }}"
                                                data-id_penerbit="{{ $katalog->penerbit->nama_penerbit }}"
                                                data-klasifikasi="{{ $katalog->class_id }}"data-id_kategori="{{ $katalog->kategori->kategori }}"
                                                data-tahun_terbit="{{ $katalog->tahun_terbit }}"
                                                data-stok_buku="{{ $katalog->stok_buku }}"
                                                data-sisa_exemplar="{{ $katalog->sisa_exemplar }}"
                                                data-deskripsi="{{ $katalog->deskripsi }}">
                                                <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                            </a>
                                            <a href="editbuku/{{ encrypt($katalog->id_buku) }}"
                                                class="btn btn-warning btn-sm" role="button">
                                                <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm btnDelBUKU"
                                                data-id="{{ $katalog->id_buku }}" data-name="{{ $katalog->judul }}"
                                                role="button">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                            </a>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa-solid fa-print"></i>&nbsp;Print</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="previewKtBuku/{{ encrypt($katalog->id_buku) }}">Preview Kartu Buku</a>
                                                    <a class="dropdown-item"
                                                        href="printKtBuku/{{ encrypt($katalog->id_buku) }}">Kartu Buku</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                <th style="width:1px; white-space:nowrap;">Cover</th>
                                <th style="width:1px; white-space:nowrap;">Jumlah Buku</th>
                                <th style="width:1px; white-space:nowrap;">Sisa Exemplar</th>
                                <th style="width:1px; white-space:nowrap;">Actions</th>
                            </tfoot>
                        </table>
                    </div>
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
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //Modal Detail Buku
            $(document).on('click', '#detail-buku', function() {
                // var id_buku = $(this).data('id_buku');
                var judul = $(this).data('judul');
                var isbn = $(this).data('isbn');
                var pengarang = $(this).data('pengarang');
                var id_penerbit = $(this).data('id_penerbit');
                var klasifikasi = $(this).data('klasifikasi');
                var id_kategori = $(this).data('id_kategori');
                var tahun_terbit = $(this).data('tahun_terbit');
                var stok_buku = $(this).data('stok_buku');
                var sisa_exemplar = $(this).data('sisa_exemplar');
                var deskripsi = $(this).data('deskripsi');
                // $('#id_buku').text(id_buku);
                $('#judul').text(judul);
                $('#isbn').text(isbn);
                $('#pengarang').text(pengarang);
                $('#penerbit').text(id_penerbit);
                $('#klasifikasi').text(klasifikasi);
                $('#kategori').text(id_kategori);
                $('#tahun_terbit').text(tahun_terbit);
                $('#stok_buku').text(stok_buku);
                $('#sisa_exemplar').text(sisa_exemplar);
                $('#deskripsi').text(deskripsi);
            })
            //Delete Buku
            $('.btnDelBUKU').click(function() {
                var bukuid = $(this).attr('data-id');
                var jdlbuku = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data buku dengan judul " + jdlbuku + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusBUKU/" + bukuid + "";
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Data telah Berhasil dihapus',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Data tidak jadi dihapus',
                            'error'
                        )
                    }
                })
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
