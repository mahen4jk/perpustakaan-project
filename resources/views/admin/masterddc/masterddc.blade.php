@extends('admin.template')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master DDC</h1>
                    <p>Data Master DDC, menampilkan klasifikasi hasil karya Melvil Dewy untuk mempermudah mencari jenis buku
                    </p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master DDC</li>
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
                        <table id="example2" class="table table-hover table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap;">Class</th>
                                    <th style="width:1px; white-space:nowrap;">About</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ddc as $klasifikasi)
                                    <tr>
                                        <td>{{ $klasifikasi->id_class }}</td>
                                        <td>{{ $klasifikasi->ket }}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" role="button">
                                                <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                            </a>
                                            <a href="#" class="btn btn-danger" role="button">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap;">Class</th>
                                <th style="width:1px; white-space:nowrap;">About</th>
                                <th style="width:1px; white-space:nowrap;">Pilihan</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection
