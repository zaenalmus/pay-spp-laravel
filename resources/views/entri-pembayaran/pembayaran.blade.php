@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Data Pembayaran</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Pembayaran</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/entri-pembayaran/bayar" class="btn btn-primary mt-4 mb-2">Bayar</a>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Petugas</th>
                                <th scope="col">Nisn Siswa</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Spp</th>
                                <th scope="col">Jumlah Bayar</th>
                                <th scope="col">Bulan Dibayar</th>
                                <th scope="col">Tanggal Bayar</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody> @foreach ($pembayaran as $i => $byr)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $byr->user->nama_petugas }}</td>
                            <td>{{ $byr->nisn }}</td>
                            <td>{{ $byr->siswa->nama }}</td>
                            <td>Rp{{ number_format($byr->spp->nominal) }}</td>
                            <td>Rp{{ number_format($byr->jumlah_bayar) }}</td>
                            <td>{{ $byr->bulan_dibayar }}</td>
                            <td>{{ $byr->created_at->format('d M Y') }}</td>
                            <td>
                                @if ($byr->jumlah_bayar >= $byr->spp->nominal)
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <span class="badge bg-danger">Belum Lunas</span>
                                @endif
                            </td>
                            <td><div class="dropdown">
                                    <button class="btn btn-outline fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="pembayaran/{{ $byr->id_pembayaran }}/edit">Sunting</a></li>
                                        <li><form action="pembayaran/{{ $byr->id_pembayaran }}" class="d-inline" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Hapus?????')">Hapus</button>
                                </form></li>
                                    </ul>
        </div>
        </td>
                        </tr>@endforeach
                    </tbody>
                    </table>
                </div></div>
            </section>
        </main><!-- End #main -->
@endsection
