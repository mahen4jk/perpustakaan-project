<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Koleksi Buku</title>
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
            <h1>Laporan Koleksi Buku</h1>
            <h3>Perpustakaan SMP Negeri 4 Waru</h3>
            <h3>Waru-Sidoarjo</h3>
        </div>
        <div>
            @if (isset($tahunInput))
                <h3>Buku Input: {{ $tahunInput }}</h3>
            @else
                <h3>Semua Data Buku</h3>
            @endif
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>ISBN</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kode Klasifikasi</th>
                <th>Stock Buku</th>
                <th>Sisa Exemplar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->klasifikasi->kode_class }}</td>
                    <td>{{ $item->stok_buku }}</td>
                    <td>{{ $item->sisa_exemplar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>

</html>
