@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Status Pembayaran</h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Jumlah Bayar</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody> @foreach ($pembayaran as $i => $byr)
                                            <tr>
                                                <th scope="row">{{ $i + 1 }}</th>
                                                <td>{{ $byr->siswa->nama }}</td>
                                                <td>{{ $byr->siswa->kelas->nama_kelas }}</td>
                                                <td>Rp{{ number_format($byr->jumlah_bayar) }}</td>
                                                <td>
                                                    @if ($byr->jumlah_bayar >= $byr->spp->nominal)
                                                        <span class="badge bg-success">Lunas</span>
                                                    @else
                                                        <span class="badge bg-danger">Belum Lunas</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Recent Sales -->

                    </div>
                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Aktivitas <span>| Hari Ini</span></h5>
                            <div class="activity">@foreach ($pembayaran as $histori)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{ $histori->created_at->diffforHumans() }}</div>
                                        @if ($histori->jumlah_bayar >= $histori->spp->nominal)
                                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                        @else
                                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                        @endif
                                    <div class="activity-content">
                                        <div class="fw-bold">{{ $histori->user->nama_petugas }}</div>
                                        {{ $histori->siswa->nama }} telah membayar spp sebesar Rp{{ number_format($histori->jumlah_bayar) }}
                                    </div>
                                </div>
                            @endforeach
                                <!-- End activity item-->
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Activity -->
                </div>
                </div>
            </section>
        </main><!-- End #main -->

@endsection
