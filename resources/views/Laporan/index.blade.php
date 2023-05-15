@extends('layouts.dashboard')

@section('content')
<main id="main" class="main">
<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Buat Laporan</div>
                <div class="alert alert-warning">Buat Laporan Pembayaran SPP siswa</div>
                <a href="{{ route('pdff') }}" class="btn btn-primary">Buat Laporan</a>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
