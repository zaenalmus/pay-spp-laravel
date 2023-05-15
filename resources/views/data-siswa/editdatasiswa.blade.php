@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Edit Data Siswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Siswa</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card col-6">
                        <div class="card-body">
                            <a href="/data-siswa/siswa" class="btn btn-primary mt-4 mb-2">kembali</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('siswa.update', $siswa->nisn) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">NISN</label>
                                        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIS</label>
                                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                            <select name="kelas" id="" class="form-select" {{ count($kelas) ==0 ? 'disabled' : '' }}>
                                            @if (count($kelas) == 0 )
                                                <option value="">tidak ada pilihan</option>
                                                    @else
                                                        <option value="">pilih</option>
                                                    @foreach($kelas as $kelass)
                                                        <option value="{{ $kelass->id_kelas }}" {{ $siswa->id_kelas == $kelass->id_kelas ? 'selected' : '' }}>{{ $kelass->nama_kelas }}</option>
                                                    @endforeach
                                            @endif
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" value="{{ $siswa->no_telp }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Spp</label>
                                            <select name="spp" id="" class="form-select" {{ count($spp) ==0 ? 'disabled' : '' }}>
                                            @if (count($spp) == 0 )
                                                <option value="">tidak ada pilihan</option>
                                                    @else
                                                        <option value="">pilih</option>
                                                    @foreach($spp as $spps)
                                                        <option value="{{ $spps->id_spp }}"{{ $siswa->id_spp == $spps->id_spp ? 'selected' : '' }}>{{ 'Tahun ' .$spps->tahun.' - '.'Rp. '.number_format($spps->nominal) }}</option>
                                                    @endforeach
                                            @endif
                                            </select>
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
