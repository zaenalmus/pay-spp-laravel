@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Edit Data Pembayaran</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Pembayaran</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card col-6">
                        <div class="card-body">
                            <a href="/entri-pembayaran/pembayaran" class="btn btn-primary mt-4 mb-2">kembali</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                        <select name="nisn" id="" class="form-select" required>
                                                    <option value="">pilih</option>
                                                @foreach($siswa as $s)
                                                    <option value="{{ $s->nisn }}"{{ $pembayaran->nisn == $s->nisn ? 'selected' : '' }}>{{ $s->nama. ' - ' .$s->nisn }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                        <div class="form-group">
                                        <label for="">Bulan Bayar</label>
                                            <select name="bulan_dibayar" id="" class="form-select">
                                                <option value="">pilih</option>
                                                @foreach (['Januari',
                                                            'Februari',
                                                            'Maret',
                                                            'April',
                                                            'Mei',
                                                            'Juni',
                                                            'Juli',
                                                            'Agustus',
                                                            'September',
                                                            'Oktober',
                                                            'November',
                                                            'Desember'] as $bulan)
                                                <option value="{{ strtolower($bulan) }}"
                                                {{ $pembayaran->bulan_dibayar == strtolower($bulan) ? 'selected' : '' }}>{{ $bulan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Spp</label>
                                            <select name="id_spp" id="" class="form-select" {{ count($spp) ==0 ? 'disabled' : '' }} required>
                                            @if (count($spp) == 0 )
                                                <option value="">tidak ada pilihan</option>
                                                    @else
                                                        <option value="">pilih</option>
                                                    @foreach($spp as $sp)
                                                        <option value="{{ $sp->id_spp }}"{{ $pembayaran->id_spp == $sp->id_spp ? 'selected' : '' }}>{{ 'Tahun ' .$sp->tahun.' - '.'Rp. '.number_format($sp->nominal) }}</option>
                                                    @endforeach
                                            @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah Bayar</label>
                                            <input type="text" name="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}" required>
                                        </div>
                                    <div class="card-footer d-grid justify-content-end">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <p class="alert alert-danger">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- End #main -->
@endsection
