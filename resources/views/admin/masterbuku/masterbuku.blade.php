@extends('admin.template')

@section('title')
    {{'Master Buku'}}
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
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
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
                            </div>
                            <div class="col-lg-5">
                                <!-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                     <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                                    </div> --> <br />
                            </div>
                        </div>
                        <table id="example2" class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Jumlah Buku</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
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
                                        <td>{{ $katalog->stok_buku }}</td>
                                        <td>
                                            <a id="detail-buku" class="btn btn-default btn-sm" data-toggle="modal"
                                                data-target="#modal-detail-buku" data-id_buku="{{ $katalog->id_buku }}"
                                                data-judul="{{ $katalog->judul }}" data-isbn="{{ $katalog->isbn }}"
                                                data-pengarang="{{ $katalog->pengarang }}"
                                                data-id_penerbit="{{ $katalog->penerbit->nama_penerbit }}"
                                                data-klasifikasi="{{ $katalog->class_id }}"data-id_kategori="{{ $katalog->kategori->kategori }}"
                                                data-tahun_terbit="{{ $katalog->tahun_terbit }}"
                                                data-stok_buku="{{ $katalog->stok_buku }}"
                                                data-deskripsi="{{ $katalog->deskripsi }}">
                                                <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                            </a>
                                            <a href="editbuku/{{ $katalog->id_buku }}" class="btn btn-warning btn-sm"
                                                role="button">
                                                <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm btnDelBUKU"
                                                data-id="{{ $katalog->id_buku }}" data-name="{{ $katalog->judul }}"
                                                role="button">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                <th style="width:1px; white-space:nowrap;">Judul Buku</th>
                                <th style="width:1px; white-space:nowrap;">Jumlah Buku</th>
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
                                            <th style="">Stok</th>
                                            <td><span id="stok_buku"></span></td>
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
