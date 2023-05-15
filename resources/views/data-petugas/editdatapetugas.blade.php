

@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Edit Data Petugas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Petugas</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card col-6">
                        <div class="card-body">
                            <a href="/data-petugas/petugas" class="btn btn-primary mt-4 mb-2">kembali</a>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('petugas.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama Petugas</label>
                                        <input type="text" name="nama_petugas" class="form-control" value="{{ $user->nama_petugas }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level</label>
                                            <select name="level" id="" class="form-select">
                                                        <option value="">pilih</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="petugas">Petugas</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">password</label>
                                        <input type="text" name="password" class="form-control">
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
