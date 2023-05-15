@extends('layouts.dashboardsiswa')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-bold">Histori Pembayaran</div>
                    <table class="table table-hover table-bordered">
                        <thead class="table table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>SPP Bulan</th>
                                <th>Nominal SPP</th>
                                <th>Jumlah Bayar</th>
                                <th>Tunggakan</th>
                                <th>Tanggal Bayar</th>
                            </tr>
                        </thead>
                        <tbody> @foreach ($pembayaran as $bayar)
                            <tr>
                                <td class="text-uppercase">{{ $bayar->nisn. ' - ' . $bayar->siswa->kelas->nama_kelas }}</td>
                                <td class="text-capitalize">{{ $bayar->bulan_dibayar }}</td>
                                <td>Rp{{ number_format($sppnominal = $bayar->spp->nominal) }}</td>
                                <td>Rp{{ number_format($jumlahbayar = $bayar->jumlah_bayar) }}</td>
                                <td>Rp{{ number_format($sppnominal - $jumlahbayar) }}</td>
                                <td>{{ $bayar->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 pagination-sm">
                    {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
