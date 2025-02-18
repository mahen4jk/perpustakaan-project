<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kunjungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
            height: auto;
        }

        .header h1,
        .header h3 {
            margin: 5px 0;
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
            <h1>Laporan Kunjungan</h1>
            <h3>Perpustakaan SMP Negeri 4 Waru</h3>
            <h3>Waru-Sidoarjo</h3>
        </div>
        <div>
            @if (isset($tahunAjaran))
                <h3>Tahun Ajaran: {{ $tahunAjaran }}</h3>
            @else
                <h3>Semua Data Kunjungan</h3>
            @endif
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Anggota</th>
                <th>Kelas</th>
                <th>Tanggal Berkunjung</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentDate = '';
                $rowCount = 0;
                $rowspans = [];
            @endphp
            @forelse ($reports as $item)
                @php
                    // Jika tanggal berubah, hitung jumlah baris dengan tanggal yang sama
                    if ($currentDate !== $item->tgl_kunjungan) {
                        // Set currentDate ke tanggal baru
                        $currentDate = $item->tgl_kunjungan;
                        // Hitung jumlah baris dengan tanggal yang sama
                        $rowCount = $reports->where('tgl_kunjungan', $currentDate)->count();
                        // Simpan hasil hitungan ke dalam array $rowspans
                        $rowspans[$currentDate] = $rowCount;
                    }
                @endphp
                <tr>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama_anggota }}</td>
                    <td>{{ $item->kelas }}</td>
                    @if (isset($rowspans[$item->tgl_kunjungan]) && $rowspans[$item->tgl_kunjungan] > 0)
                        <td rowspan="{{ $rowspans[$item->tgl_kunjungan] }}">{{ $item->tgl_kunjungan }}</td>
                        @php
                            // Set count ke 0 setelah baris pertama dari tanggal yang sama
                            $rowspans[$item->tgl_kunjungan] = 0;
                        @endphp
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data untuk ditampilkan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
