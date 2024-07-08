<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 30cm;
            /* Increased width to accommodate two tables side by side */
            height: 20cm;
        }

        .box-model {
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            page-break-inside: avoid;
            float: left;
            /* Add this to make the boxes float next to each other */
            width: 33.33%;
            /* Set width to 50% for two columns */
            margin-right: 10px;
        }

        h4 {
            padding: inherit;
            text-align: center;
        }

        .buku-details {
            margin-top: 20px;
        }

        .detail {
            margin-bottom: 10px;
        }

        .detail label {
            font-weight: bold;
        }

        .detail span {
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="row">
        @for ($i = 1; $i <= $buku->stok_buku; $i++)
            <div class="col-md-6 box-model">
                <h4>Pepustakaan </br> SMP Negeri 4 Waru</h4>
                <h4>Kartu Buku</h4>
                <div class="buku-details">
                    <div class="detail">
                        <label>No Eksemplar:</label>
                        <span>{{ $i }}</span>
                    </div>
                    <div class="detail">
                        <label>Pengarang:</label>
                        <span>{{ $buku->pengarang }}</span>
                    </div>
                    <div class="detail">
                        <label>Judul:</label>
                        <span>{{ $buku->judul }}</span>
                    </div>
                </div>
                <table>
                    <!-- Your table content here -->
                    <thead>
                        <tr>
                            <th style="text-align: center">Peminjam</th>
                            <th style="text-align: center">Tgl Pinjam</th>
                            <th style="text-align: center">Tgl Kembali</th>
                            <th style="text-align: center">Paraf</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($tb = 0; $tb <= 14; $tb++)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            @if ($i % 3 == 0)
                <div style="clear: both;"></div>
            @endif
        @endfor
    </div>
</body>

</html>
