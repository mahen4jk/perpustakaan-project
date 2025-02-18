@extends('layout.dashboard.app')

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
                        {{-- <a href="{{ url('anggota/exportanggota') }}" class="btn btn-secondary"><i
                                class="fa-regular fa-file-excel"></i>
                            Export Anggota</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#modal-import-anggota">
                            <span class="fa-solid fa-file-import"></span> Import Anggota
                        </button> --}}
                        <div class="row">
                            {{-- <div class="col-lg-7 pt-8">
                            </div>
                            <div class="col-lg-5">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div> --}}
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Kelas</th>
                                        <th style="width:1px; white-space:nowrap;">NIS</th>
                                        <th style="width:1px; white-space:nowrap;">Nama</th>
                                        <th style="width:1px; white-space:nowrap;">Kelamin</th>
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
                                            <td>{{ $anggota->kelas->kelas }}</td>
                                            <td>{{ $anggota->nis }}</td>
                                            <td>{{ $anggota->nama_anggota }}</td>
                                            <td>
                                                @if ($anggota->j_kelamin == 'L')
                                                    Laki-Laki
                                                @elseif ($anggota->j_kelamin == 'P')
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>
                                                <a href="editANG/{{ encrypt($anggota->id_anggota) }}"
                                                    class="btn btn-warning btn-sm" role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm btnDelAnggota"
                                                    data-id="{{ $anggota->id_anggota }}"
                                                    data-name="{{ $anggota->nama_anggota }}" role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kelas</th>
                                    <th style="width:1px; white-space:nowrap;">NIS</th>
                                    <th style="width:1px; white-space:nowrap;">Nama</th>
                                    <th style="width:1px; white-space:nowrap;">Kelamin</th>
                                    <th style="width:1px; white-space:nowrap;">Actions</th>
                                </tfoot>
                            </table>
                        </div>
                        {{-- <div class="modal fade" id="modal-detail-anggota">
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
                                                    <th style="">Alamat</th>
                                                    <td><span id="alamat"></span></td>
                                                </tr>
                                                <tr>
                                                    <th style="">No. Handphone</th>
                                                    <td><span id="no_hp"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- Modal Import Anggota -->
                {{-- <div class="modal fade" id="modal-import-anggota">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Import Data Anggota</h4>
                                <button type="buttton" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="importanggota" method="POST" enctype="multipart/form-data">
                                <div class="modal-body tabble-responsive">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="file" name="file" required>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // //Modal Detail Anggota
            // $(document).on('click', '#detail-anggota', function() {
            //     var nis = $(this).data('nis');
            //     var nm_lengkap = $(this).data('nm_lengkap');
            //     var j_kelamin = $(this).data('j_kelamin');
            //     var kelas = $(this).data('kelas');
            //     var alamat = $(this).data('alamat');
            //     var no_hp = $(this).data('no_hp');
            //     // var status = $(this).data('status');
            //     $('#nis').text(nis);
            //     $('#nm_lengkap').text(nm_lengkap);
            //     $('#j_kelamin').text(j_kelamin);
            //     $('#kelas').text(kelas);
            //     $('#alamat').text(alamat);
            //     $('#no_hp').text(no_hp);
            //     // $('#status').text(status);
            // })

            //Delete Anggota
            $('.btnDelAnggota').click(function() {
                var anggotaid = $(this).attr('data-id');
                var namaanggota = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data anggota bernama " + namaanggota + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusAnggota/" + anggotaid + "";
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
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
