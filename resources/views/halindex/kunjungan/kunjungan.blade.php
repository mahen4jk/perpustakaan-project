@extends('Layout.Home.app')

@section('title')
    {{ 'Kunjungan' }}
@endsection

@section('style')
@endsection


@section('jumbotron')
    <div class="jumbotron jumbotron-fluid jmb-katalog">
        <div class="container">
            <h1 class="display-4">Kunjungan</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="margin-top: 5px">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kunjungan</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <hr style="margin-top: -15px; border: 1px solid lightgrey;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-auto">
                                <select name="kunjungan" class="kunjungan form-control select2bs4">
                                    <option selected="selected">Masukan Nomor Induk Siswa</option>
                                    @foreach ($anggota as $anggota)
                                        @php
                                            $values = [$anggota->id_anggota, $anggota->kelas_id];
                                            $combinedValues = implode(',', $values);
                                        @endphp
                                        <option value="{{ $combinedValues }}">{{ $anggota->nis }} -
                                            {{ $anggota->nama_anggota }} - {{ $anggota->kelas->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="simpan" class="btn btn-success"><i
                                        class="fa-regular fa-floppy-disk"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <table class="table table-hover table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
