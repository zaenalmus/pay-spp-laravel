@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Bayar</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">entry pembayaran</li>
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
                            <form action="{{ route('pembayaran.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Siswa</label>
                                            <select name="nisn" id="" class="form-select">
                                                        <option value="">pilih</option>
                                                    @foreach($siswa as $s)
                                                        <option value="{{ $s->nisn }}">{{ $s->nama. ' - ' .$s->nisn }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Bulan Bayar</label>
                                            <select name="bulan_dibayar" id="" class="form-select">
                                                <option value="">pilih</option>
                                                <option value="januari">Januari</option>
                                                <option value="februari">Februari</option>
                                                <option value="maret">Maret</option>
                                                <option value="april">April</option>
                                                <option value="mei">Mei</option>
                                                <option value="juni">Juni</option>
                                                <option value="juli">Juli</option>
                                                <option value="agustus">Agustus</option>
                                                <option value="september">September</option>
                                                <option value="oktober">Oktober</option>
                                                <option value="november">November</option>
                                                <option value="desember">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="">Spp</label>
                                            <select name="id_spp" id="" class="form-select" {{ count($spp) ==0 ? 'disabled' : '' }}>
                                            @if (count($spp) == 0 )
                                                <option value="">tidak ada pilihan</option>
                                                    @else
                                                        <option value="">pilih</option>
                                                    @foreach($spp as $spps)
                                                        <option value="{{ $spps->id_spp }}">{{ 'Tahun ' .$spps->tahun.' - '.'Rp. '.number_format($spps->nominal) }}</option>
                                                    @endforeach
                                            @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah Bayar</label>
                                            <input type="text" name="jumlah_bayar" class="form-control" value="{{ old('jumlah_bayar') }}" required>
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
