@extends('admin.template')

@section('title')
    {{ 'Sirkulasi | Pengembalian' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Sirkulasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengembalian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    {{-- isi content --}}
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
                                <br />
                            </div>
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

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a id="detail-anggota" class="btn btn-default btn-sm" data-toggle="modal"
                                                data-target="#modal-detail-anggota">
                                                <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                            </a>
                                            <a href="" class="btn btn-warning btn-sm" role="button">
                                                <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm btnDelAnggota" data-id=""
                                                data-name="" role="button">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
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
    </script>
@endsection
