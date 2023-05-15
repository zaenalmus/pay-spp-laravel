@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Edit Data Kelas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Kelas</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card col-6">
                        <div class="card-body">
                            <a href="/data-kelas/kelas" class="btn btn-primary mt-4 mb-2">kembali</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kompetensi Keahlian</label>
                                        <input type="text" name="kompetensi_keahlian" class="form-control" value="{{ $kelas->kompetensi_keahlian }}" required>
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
