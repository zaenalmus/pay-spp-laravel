
@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Data Petugas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Data Petugas</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/data-petugas/buatdatapetugas" class="btn btn-primary mt-4 mb-2">Tambah Data</a>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                            <tbody> @foreach ($user as $i => $petugas)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $petugas->nama_petugas }}</td>
                            <td>{{ $petugas->username }}</td>
                            <td>{{ $petugas->email }}</td>
                            <td>{{ $petugas->level }}</td>
                            <td><a href="petugas/{{ $petugas->id }}/edit" class="btn btn-outline-success">Sunting</a>
                                <form action="petugas/{{ $petugas->id }}" class="d-inline" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('YAKINNNN?????')">Hapus</button>
                                </form></td>
                        </tr>@endforeach
                    </tbody>
                    </table>
                </div>
            </section>
        </main><!-- End #main -->
@endsection
