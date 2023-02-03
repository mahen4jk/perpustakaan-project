@extends('admin.template')

@section('title')
    {{ 'Master Anggota' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Anggota</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Master Anggota</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('anggota/tambahanggota') }}" class="btn btn-success"><i
                                class="fa-solid fa-plus"></i>
                            Tambah Anggota</a>
                        <div class="row">
                            <div class="col-lg-7">
                            </div>
                            <!-- <div class="col-lg-5">
                                                                                    <div class="input-group mb-3">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                                                                                    </div>
                                                                                </div> --> <br />
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">NIS</th>
                                        <th style="width:1px; white-space:nowrap;">Nama</th>
                                        <th style="width:1px; white-space:nowrap;">Kelas</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($anggota as $anggota)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $anggota->nis }}</td>
                                            <td>{{ $anggota->nama_lengkap }}</td>
                                            <td>{{ $anggota->kelas->nama_kelas }}</td>
                                            <td>
                                                <a id="detail-anggota" class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#modal-detail-anggota" data-nis="{{ $anggota->nis }}"
                                                    data-nm_lengkap="{{ $anggota->nama_lengkap }}"
                                                    data-j_kelamin="{{ $anggota->j_kelamin }}"
                                                    data-kelas="{{ $anggota->kelas->nama_kelas }}"
                                                    data-no_hp="{{ $anggota->hp }}" data-status="{{ $anggota->status }}">
                                                    <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                                </a>
                                                <a href="editANG/{{ encrypt($anggota->nis) }}"
                                                    class="btn btn-warning btn-sm" role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm btnDelAnggota"
                                                    data-id="{{ $anggota->nis }}" data-name="{{ $anggota->nama_lengkap }}"
                                                    role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">NIS</th>
                                    <th style="width:1px; white-space:nowrap;">Nama</th>
                                    <th style="width:1px; white-space:nowrap;">Kelas</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal fade" id="modal-detail-anggota">
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
                                                    <th style="">NIS</th>
                                                    <td><span id="nis"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">Nama Lengkap</th>
                                                    <td><span id="nm_lengkap"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">Jenis Kelamin</th>
                                                    <td><span id="j_kelamin"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">Kelas</th>
                                                    <td><span id="kelas"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">No. Handphone</th>
                                                    <td><span id="no_hp"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">Status</th>
                                                    <td><span id="status"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection
