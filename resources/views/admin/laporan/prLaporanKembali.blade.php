<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            /* Mengatur posisi teks ke tengah */
            margin-bottom: 20px;
            /* Margin bawah untuk memberi ruang */
        }

        .header img {
            max-width: 100px;
            /* Atur lebar maksimum logo */
            height: auto;
            /* Biarkan ketinggiannya disesuaikan */
        }

        .header h1,
        .header h3 {
            margin: 5px 0;
            /* Margin atas dan bawah untuk memisahkan elemen */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/image/logo.png'))) }}"
            alt="Logo Sekolah">
        <div>
            <h1>Laporan Pengembalian</h1>
            <h3>Perpustakaan SMP Negeri 4 Waru</h3>
            <h3>Waru-Sidoarjo</h3>
        </div>
        <div>
            @if (isset($tahunKembali))
                <h3>Kembali Input: {{ $tahunKembali }}</h3>
            @else
                <h3>Semua Data Pengembalian</h3>
            @endif
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Kode Kembali</th>
                <th>Nama Anggota</th>
                <th>Judul</th>
                <th>Tanggal Pengembalian</th>
                <th>Terlambat</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $item)
                <tr>
                    <td>{{ $item->kode_kembali }}</td>
                    <td>
                        @foreach ($sirPinjam as $kembali21)
                            @if ($kembali21->kode_pinjam == $item->pinjam_kode)
                                @foreach ($Anggota as $kembali22)
                                    @if ($kembali22->id_anggota == $kembali21->anggota_id)
                                        {{ $kembali22->nama_anggota }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($sirPinjam as $kembali21)
                            @if ($kembali21->kode_pinjam == $item->pinjam_kode)
                                @foreach ($Buku as $kembali22)
                                    @if ($kembali22->id_buku == $kembali21->buku_id)
                                        {{ $kembali22->judul }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->tgl_dikembalikan }}</td>
                    <td>{{ $item->terlambat }} Hari</td>
                    <td>Rp. {{ $item->total_denda }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>Dicetak pada {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
