@extends('admin.template')

@section('title')
    {{ 'Master Penerbit' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Penerbit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Penerbit</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-newspaper"></i> Master Penerbit</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('penerbit/tambahpenerbit') }}" class="btn btn-success"><i
                                class="fa-solid fa-plus"></i> Tambah Data Penerbit</a>
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
                        <div class="table-responsive-sm">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Nama Penerbit</th>
                                        <th style="width:1px; white-space:nowrap;">No Telp.</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($penerbit as $PEN)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $PEN->nama_penerbit }}</td>
                                            <td>{{ $PEN->pic_hp }}</td>
                                            <td>
                                                <a id="detail-penerbit" class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#modal-detail-penerbit"
                                                    data-id_penerbit="{{ $PEN->id_penerbit }}"
                                                    data-nm_penerbit="{{ $PEN->nama_penerbit }}"
                                                    data-alamat="{{ $PEN->alamat }}" data-pic_hp="{{ $PEN->pic_hp }}"
                                                    data-email="{{ $PEN->email }}">
                                                    <i class="fa-regular fa-eye"></i> &nbsp;Detail
                                                </a>
                                                <a href="editPEN/{{ $PEN->id_penerbit }}" class="btn btn-warning btn-sm"
                                                    role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm btnDelPEN"
                                                    data-id="{{ $PEN->id_penerbit }}"
                                                    data-name="{{ $PEN->nama_penerbit }}" role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Nama Penerbit</th>
                                    <th style="width:1px; white-space:nowrap;">No Telp.</th>
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
    <div class="modal fade" id="modal-detail-penerbit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Penerbit Detail</h4>
                    <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body tabble-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="">ID Penerbit</th>
                                <td><span id="id_penerbit"></span></td>
                            </tr>
                            <tr>
                                <th style="">Nama Penerbit</th>
                                <td><span id="nm_penerbit"></span></td>
                            </tr>
                            <tr>
                                <th style="">Alamat</th>
                                <td><span id="alamat"></span></td>
                            </tr>
                            <tr>
                                <th style="">Pic-HP</th>
                                <td><span id="pic_hp"></span></td>
                            </tr>
                            <tr>
                                <th style="">email</th>
                                <td><span id="email"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //Modal Detail Penerbit
            $(document).on('click', '#detail-penerbit', function() {
                var id_penerbit = $(this).data('id_penerbit');
                var nama_penerbit = $(this).data('nm_penerbit');
                var alamat = $(this).data('alamat');
                var pic_hp = $(this).data('pic_hp');
                var email = $(this).data('email');
                $('#id_penerbit').text(id_penerbit);
                $('#nm_penerbit').text(nama_penerbit);
                $('#alamat').text(alamat);
                $('#pic_hp').text(pic_hp);
                $('#email').text(email);
            });
            // Delete Penerbit
            $('.btnDelPEN').click(function() {
                var penerbitid = $(this).attr('data-id');
                var penerbitnm = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data penerbit " + penerbitnm + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusPEN/" + penerbitid + "";
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
