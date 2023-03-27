@extends('admin.template')

@section('title')
    {{ 'Sirkulasi | Peminjaman' }}
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
                        <li class="breadcrumb-item active">Peminjaman</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Daftar Peminjaman Buku</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('sirkulasi/formpinjam') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Peminjaman</a>
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
                                        <th style="width:1px; white-space:nowrap;">Kode</th>
                                        <th style="width:1px; white-space:nowrap;">Tgl Kembali</th>
                                        <th style="width:1px; white-space:nowrap;">Status</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($Peminjaman as $pinjam)
                                        <tr>

                                            <td><?php echo $no++; ?></td>
                                            <td>{{ $pinjam->kode_pinjam }}</td>
                                            <td>{{ $pinjam->tgl_kembali }}</td>
                                            <td>
                                                @if ($pinjam->status == 'Pinjam')
                                                    <label class="badge badge-warning">Pinjam</label>
                                                @else
                                                    <label class="badge badge-success">Kembali</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a id="detail-anggota" class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#modal-detail-anggota">
                                                    <i class="fa-regular fa-eye"></i>&nbsp;Detail
                                                </a>
                                                <a href="" class="btn btn-warning btn-sm" role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                                {{-- <a href="#" class="btn btn-danger btn-sm btnDelAnggota" data-id=""
                                                    data-name="" role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Hapus</button>
                                                </a> --}}
                                                <a href="updatePinjam/{{ $pinjam->kode_pinjam }}"
                                                    class="btn btn-danger btn-sm" role="button">
                                                    <i class="fa-solid fa-trash"></i>&nbsp;Test Hapus/Kembali</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Kode</th>
                                    <th style="width:1px; white-space:nowrap;">Tgl Kembali</th>
                                    <th style="width:1px; white-space:nowrap;">Status</th>
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
