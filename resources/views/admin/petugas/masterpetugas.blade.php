@extends('layout.dashboard.app')

@section('title')
    {{ 'Master Petugas' }}
@endsection

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Master Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Master Petugas</li>
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
                        <h5 class="m-0 bi"><i class="fa-solid fa-folder-minus"></i> Master Petugas</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('petugas/formpetugas') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Tambah Petugas</a>
                        <div class="row">
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-sm table-responsive-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:1px; white-space:nowrap;">No</th>
                                        <th style="width:1px; white-space:nowrap;">Foto Profil</th>
                                        <th style="width:1px; white-space:nowrap;">Nama</th>
                                        <th style="width:1px; white-space:nowrap;">Jenis Kelamin</th>
                                        <th style="width:1px; white-space:nowrap;">Roles</th>
                                        <th style="width:1px; white-space:nowrap;">Status</th>
                                        <th style="width:1px; white-space:nowrap;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($petugas as $petugas)
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                @if ($petugas->avatar)
                                                    <img src="{{ asset('image/user/' . $petugas->avatar) }}"
                                                        style="max-width: 100px; max-height: 100px" alt="Profile Picture">
                                                @else
                                                    <img src="{{ asset('image/no-image.png') }}" alt="No Image"
                                                        style="max-width: 100px; max-height: 100px">
                                                @endif
                                            </td>
                                            <td>{{ $petugas->name }}</td>
                                            <td>{{ $petugas->gender }}</td>
                                            <td>{{ $petugas->roles }}</td>
                                            <td>
                                                @if ($petugas->status == 'INACTIVE')
                                                    <label class="badge badge-success">Inactive</label>
                                                @else
                                                    <label class="badge badge-warning">Active</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="editPTS/{{encrypt($petugas->id)}}" class="btn btn-warning btn-sm" role="button">
                                                    <i class="fa-solid fa-pen-nib"></i>&nbsp;Ubah
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th style="width:1px; white-space:nowrap;">No</th>
                                    <th style="width:1px; white-space:nowrap;">Foto Profil</th>
                                    <th style="width:1px; white-space:nowrap;">Nama</th>
                                    <th style="width:1px; white-space:nowrap;">Jenis Kelamin</th>
                                    <th style="width:1px; white-space:nowrap;">Roles</th>
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
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
