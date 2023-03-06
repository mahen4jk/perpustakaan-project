@extends('admin.template')

@section('title')
    {{ 'Master Kategori' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Master Kategori</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('kategori/tambahkategori') }}" class="btn btn-success"><i
                                class="fa-solid fa-plus"></i> Tambah Data Kategori</a>
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
                            <table id="example2" class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Kategori</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($kategori as $KAT)
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no++; ?></td>
                                            <td>{{ $KAT->kategori }}</td>
                                            <td>
                                                <a href="editKat/{{ $KAT->id_kategori }}" class="btn btn-warning"
                                                    role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btnDelKAT"
                                                    data-id="{{ $KAT->id_kategori }}" data-name="{{ $KAT->kategori }}"
                                                    role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap; text-align:center;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kategori</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Jumlah Data : {{ $kategori->count() }}</p>
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
            // Delete Kategori
            $('.btnDelKAT').click(function() {
                var bukuid = $(this).attr('data-id');
                var bukujdl = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data kategori dengan nama " + bukujdl + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusKAT/" + bukuid + "";
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
