<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>laporan pdf</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page { size: A4 }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1>Laporan Pembayaran spp</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nisn siswa</th>
                    <th>Nama siswa</th>
                    <th>Spp</th>
                    <th>Bulan Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
        </thead>
        <tbody> @foreach ($pembayaran as $i => $byr)
        <tr>
        <th scope="row">{{ $i + 1 }}</th>
        <td>{{ $byr->nisn }}</td>
        <td>{{ $byr->siswa->nama }}</td>
        <td>Rp{{ number_format($byr->spp->nominal) }}</td>
        <td>Rp{{ number_format($byr->jumlah_bayar) }}</td>
        <td>{{ $byr->bulan_dibayar }}</td>
        <td>{{ $byr->created_at->format('d M Y') }}</td>
        @endforeach
                    </tbody>
        </table>
    </section>
</body>
</html>
