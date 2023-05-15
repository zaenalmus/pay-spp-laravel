@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Data Siswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/data-siswa/buatdatasiswa" class="btn btn-primary mt-4 mb-2">Tambah Data</a>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                            <tbody> @foreach ($siswa as $i => $siswas)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $siswas->nisn }}</td>
                            <td>{{ $siswas->nis }}</td>
                            <td>{{ $siswas->nama }}</td>
                            <td>{{ $siswas->kelas->kompetensi_keahlian }}</td>
                            <td>{{ $siswas->alamat }}</td>
                            <td>{{ $siswas->no_telp }}</td>
                            <td><a href="siswa/{{ $siswas->nisn }}/edit" class="btn btn-outline-success">Sunting</a>
                                <form action="siswa/{{ $siswas->nisn }}" class="d-inline" method="post">
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
