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
                    {{-- <form action="{{ route('kunjungan') }}" method="POST">
                        @csrf
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">ID Anggota</label>
                                <input type="input" class="form-control mb-2" name="anggota_id" id="anggota_id"
                                    value="{{ old('anggota_id', $Anggota ? $Anggota->id_anggota : '') }}"
                                    placeholder="Anggota ID" readonly>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">NIS</label>
                                <input type="text" class="form-control mb-2" name="nis" id="nis"
                                    value="{{ old('nis', $Anggota ? $Anggota->NIS : '') }}" placeholder="NIS">
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Nama</label>
                                <input type="text" class="form-control mb-2" name="nama_anggota" id="nama_anggota"
                                    placeholder="Nama"
                                    value="{{ old('nama_anggota', $Anggota ? $Anggota->nama_anggota : '') }}" readonly>
                            </div>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInput">Kelas</label>
                                <input type="text" class="form-control mb-2" name="kelas" id="kelas_id"
                                    value="{{ old('kelas', $kelas ? $kelas->kelas : '') }}" placeholder="Kelas" readonly>
                            </div> --}}
                    {{-- <div class="col-auto">
                                <button type="button" class="btn btn-info btn-primary mb-2" id="search-nis">
                                    <i class="fa-regular fa-magnifying-glass"></i>&nbsp;Cari
                                </button>
                            </div> --}}
                    {{-- <div class="col-auto">
                                <button type="submit" class="btn btn-info btn-primary mb-2">
                                    <i class="fa-regular fa-magnifying-glass"></i>&nbsp;Cari
                                </button>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="simpan" class="btn btn-success mb-2"><i
                                        class="fa-regular fa-floppy-disk"></i>&nbsp;Simpan</button>
                            </div>
                        </div>
                    </form> --}}
                    <div class="row">
                        <div class="col-auto">
                            <form action="{{ route('search-anggota') }}" method="POST">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <label class="sr-only" for="nis">NIS</label>
                                        <input type="text" class="form-control mb-2" name="nis" id="nis"
                                            placeholder="NIS" value="{{ old('nis') }}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-info btn-primary mb-2">
                                            <i class="fa-regular fa-magnifying-glass"></i>&nbsp;Cari
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            @if (isset($anggota))
                                <form action="{{ route('save-kunjungan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="anggota_id" value="{{ $anggota->id_anggota }}">
                                    <input type="hidden" name="nis" value="{{ $anggota->NIS }}">
                                    <input type="hidden" name="nama_anggota" value="{{ $anggota->nama_anggota }}">
                                    <input type="hidden" name="kelas" value="{{ $kelas->kelas ?? '' }}">

                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input type="hidden" name="anggota_id" value="{{ $anggota->id_anggota }}">
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="nis">NIS</label>
                                            <input type="text" class="form-control mb-2" name="nis" id="nis"
                                                placeholder="NIS" value="{{ $anggota->nis }}" readonly>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="nama_anggota">Nama</label>
                                            <input type="text" class="form-control mb-2" name="nama_anggota"
                                                id="nama_anggota" value="{{ $anggota->nama_anggota }}" placeholder="Nama"
                                                readonly>
                                        </div>
                                        <div class="col-auto">
                                            <label class="sr-only" for="kelas_id">Kelas</label>
                                            <input type="text" class="form-control mb-2" name="kelas" id="kelas_id"
                                                value="{{ $kelas->kelas ?? '' }}" placeholder="Kelas" readonly>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-success mb-2">
                                                <i class="fa-regular fa-floppy-disk"></i>&nbsp;Simpan Kunjungan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12 mt-3">
                    <div class="row">
                        <table class="table table-hover table-sm table-responsive-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $noIterasi = 1;
                                @endphp
                                @foreach ($kunjungan as $kunjungan)
                                    <tr>
                                        <td>{{ $noIterasi }}</td>
                                        <td>{{ $kunjungan->nis }}</td>
                                        <td>{{ $kunjungan->nama_anggota }}</td>
                                        <td>{{ $kunjungan->kelas }}</td>
                                        <td>{{ $kunjungan->tgl_kunjungan }}</td>
                                    </tr>
                                    @php
                                        $noIterasi++;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    {{ $kunPaginator->links() }}
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        // $(document).ready(function() {
        //     $('#search-nis').on('click', function() {
        //         var nis = $('#nis').val();
        //         $.ajax({
        //             url: '/get-member-details/' + nis,
        //             method: 'GET',
        //             success: function(response) {
        //                 $('#anggota_id').val(response.id_anggota);
        //                 $('#nama_anggota').val(response.nama_anggota);
        //                 $('#kelas_id').val(response.kelas);
        //             },
        //             error: function(xhr) {
        //                 alert('Member not found');
        //             }
        //         });
        //     });
        // });

        $(document).ready(function() {
            $('#dtMdlAnggota').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        })

    </script>
@endsection
