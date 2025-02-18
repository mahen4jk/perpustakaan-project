@extends('layout.dashboard.app')

@section('title')
    {{ 'Master DDC' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master DDC</h1>
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
                        <h5 class="m-0 bi"> <i class="fa-solid fa-book"></i> Master DDC</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('ddc/tambahddc') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Tambah Data DDC</a>
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
                        <table id="example2" class="table table-hover table-sm" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kode</th>
                                    <th style="width:1px; white-space:nowrap;">About</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($ddc as $klasifikasi)
                                    <tr>
                                        <td style="text-align:center;"><?php echo $no++; ?></td>
                                        <td>{{ $klasifikasi->kode_class }}</td>
                                        <td>{{ $klasifikasi->ket }}</td>
                                        <td>
                                            <a href="editDDC/{{ encrypt($klasifikasi->id_class) }}" class="btn btn-warning"
                                                role="button">
                                                <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                            </a>
                                            <a href="#" class="btn btn-danger btnDelDDC" data-id="{{ $klasifikasi->id_class }}"
                                                data-name="{{ $klasifikasi->ket }}" role="button">
                                                <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width:1px; white-space:nowrap;">No</th>
                                <th style="width:1px; white-space:nowrap;">Kode</th>
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

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //Delete DDC
            $('.btnDelDDC').click(function() {
                var DDCid = $(this).attr('data-id');
                var ketDDC = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data anggota bernama " + ketDDC + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusDDC/" + DDCid + "";
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
            });
            // Tabel
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "scrollY": "50vh",
                "scrollCollapse": true
            });
        });
    </script>
@endsection
