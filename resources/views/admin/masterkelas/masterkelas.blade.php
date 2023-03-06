@extends('admin.template')

@section('title')
    {{ 'Master Kelas' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Kelas</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Master Kelas</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('kelas/tambahkelas') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Tambah Data Kelas</a>
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
                                        {{-- <th style="width:1px; white-space:nowrap;">ID Kelas</th> --}}
                                        <th style="width:1px; white-space:nowrap;">Nama Kelas</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($kelas as $kelas)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            {{-- <td>{{ $kelas->id_kelas }}</td> --}}
                                            <td>{{ $kelas->kelas }}</td>
                                            <td>
                                                <a href="editKEL/{{ $kelas->id_kelas }}" class="btn btn-warning"
                                                    role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btnDelKELAS"
                                                    data-id="{{ $kelas->id_kelas }}" data-name="{{ $kelas->nama_kelas }}"
                                                    role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    {{-- <th style="width:1px; white-space:nowrap;">ID Kelas</th> --}}
                                    <th style="width:1px; white-space:nowrap;">Nama Kelas</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <p>Jumlah Data : </p> -->
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
            // Delete Kelas
            $('.btnDelKELAS').click(function() {
                var kelasid = $(this).attr('data-id');
                var namakls = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data kelas dengan nama " + namakls + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusKEL/" + kelasid + "";
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
            });
        });
    </script>
@endsection
