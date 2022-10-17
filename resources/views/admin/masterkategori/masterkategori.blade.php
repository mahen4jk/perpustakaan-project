@extends('admin.tempplate')

@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Master Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Master Kategori</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Isi content -->
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-auto">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0 bi"> <i class="fa-solid fa-book"></i> Master Buku</h5>
                </div>
                <div class="card-body">
                    <a href="{{url('buku/tambahbuku')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Data Buku</a>
                    <div class="row">
                        <div class="col-lg-7">
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align:center">No</th>
                                <th style="text-align:center">Id Buku</th>
                                <th style="text-align:center">Judul Buku</th>
                                <th style="text-align:center">Kategori</th>
                                <th style="text-align:center">Pengarang</th>
                                <th style="text-align:center">Penerbit</th>
                                <th style="text-align:center">Stok Tersedia</th>
                                <th style="text-align:center">Stok Dipinjam</th>
                                <th style="text-align:center">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center">1</td>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Id Buku</th>
                            <th style="text-align:center">Judul Buku</th>
                            <th style="text-align:center">Kategori</th>
                            <th style="text-align:center">Pengarang</th>
                            <th style="text-align:center">Penerbit</th>
                            <th style="text-align:center">Stok Tersedia</th>
                            <th style="text-align:center">Stok Dipinjam</th>
                            <th style="text-align:center">Pilihan</th>
                        </tfoot>
                    </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <p>Jumlah Data : </p>
                        </div>
                        <div class="col-lg-6">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" style="float:right;">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
</div>
@endsection