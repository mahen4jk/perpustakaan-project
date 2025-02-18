@extends('layout.dashboard.app')

@section('title')
    {{ 'Master Pendidik' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Pendidik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Pendidik</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Master Pendidik</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('pendik/formPendik') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Tambah Pendidik</a>
                        <div class="row">
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">NIP</th>
                                        <th style="width:1px; white-space:nowrap;">Nama</th>
                                        <th style="width:1px; white-space:nowrap;">Kelamin</th>
                                        <th style="width:1px; white-space:nowrap;">Jabatan</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($pendik as $pendik)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $pendik->nip }}</td>
                                            <td>{{ $pendik->nama_pendik }}</td>
                                            <td>
                                                @if ($pendik->j_kelamin == 'L')
                                                    Laki-Laki
                                                @elseif ($pendik->j_kelamin == 'P')
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pendik->roles == 'kep_sek')
                                                    Kepala Sekolah
                                                @elseif ($pendik->roles == 'kep_perpus')
                                                    Kepala Perpustakaan
                                                @elseif ($pendik->roles == 'guru')
                                                    Guru
                                                @elseif ($pendik->roles == 'tu')
                                                    Tata Usaha
                                                @elseif ($pendik->roles == 'admin')
                                                    Admin
                                                @elseif ($pendik->roles == 'pustaka')
                                                    Pustakawan
                                                @elseif ($pendik->roles == 'karyawan')
                                                    Karyawan
                                                @endif
                                            <td>
                                                <a href="editPNDK/{{ encrypt($pendik->id_pendik) }}"
                                                    class="btn btn-warning btn-sm" role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm btnDelAnggota"
                                                    data-id="{{ $pendik->id_pendik }}"
                                                    data-name="{{ $pendik->nama_pendik }}" role="button">
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
                                    <th style="width:1px; white-space:nowrap;">Kelamin</th>
                                    <th style="width:1px; white-space:nowrap;">Jabatan</th>
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
            //Delete Anggota
            $('.btnDelAnggota').click(function() {
                var pendikID = $(this).attr('data-id');
                var namapendik = $(this).attr('data-name');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data pendik bernama " + namapendik + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "hapusAnggota/" + pendikID + "";
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
