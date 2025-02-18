<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Label Buku</title>
    <style>
        .labels-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Dua kolom per baris */
            grid-auto-flow: row; /* Aliran konten menjadi vertikal (ke bawah) */
            grid-gap: 10px; /* Ruang antara grid item */
            margin: 10px; /* Margin untuk kontainer label */
        }

        .label {
            font-family: Arial, sans-serif;
            border: 1px solid #000;
            padding: 10px;
            width: 5cm;
            /* Ukuran lebar 5 cm */
            height: 6cm;
            /* Ukuran tinggi 6 cm */
            position: relative;
            /* Menjadikan posisi relatif untuk elemen teks tambahan */
            text-align: center;
            /* Teks di dalam label center */
            box-sizing: border-box;
            /* Untuk memperhitungkan padding dan border ke dalam lebar */
            margin-bottom: 10px;
        }

        .label-text {
            font-size: 17px;
            /* Ukuran font teks tambahan */
            white-space: pre-line;
            /* Menjaga baris pemisah (br) */
        }

        .label-item {
            font-size: 20px;
            text-align: center;
            /* Teks dalam item center */
            margin-bottom: 5px;
            /* Jarak bawah antara item */
            margin-top: 20px;
            /* Jarak atas dari label-text */
        }

        .line {
            border-bottom: 1px solid #000;
            /* Garis bawah */
            margin-bottom: 5px;
            /* Jarak antara teks tambahan dan nomor klasifikasi */
        }

        /* Optional: Untuk mengatur margin atas dan bawah halaman PDF */
        body {
            margin: 0;
            /* Atur margin halaman menjadi 0 */
        }
    </style>
    </style>
</head>

<body>

    <div class="labels-container">
        @for ($i = 1; $i <= $Buku->stok_buku; $i++)
            <div class="label">
                <div class="label-text">Perpustakaan<br>SMP Negeri 4 Waru<br>Sidoarjo</div>
                <div class="line"></div>
                <div class="label-item">{{ $Buku->klasifikasi->kode_class }}</div>
                <div class="label-item">{{ strtoupper(substr($Buku->pengarang, 0, 3)) }}</div>
                <div class="label-item">{{ strtoupper(substr($Buku->judul, 0, 1)) }}</div>
            </div>
        @endfor
    </div>

</body>

</html>
