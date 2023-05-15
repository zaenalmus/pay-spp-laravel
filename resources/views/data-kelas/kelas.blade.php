@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Data Kelas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Data Kelas</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/data-kelas/buatdatakelas" class="btn btn-primary mt-4 mb-2">Tambah Data</a>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Kompetensi Keahlian</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                            <tbody> @foreach ($kelas as $i => $kelass)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $kelass->nama_kelas }}</td>
                            <td>{{ $kelass->kompetensi_keahlian }}</td>
                            <td><a href="kelas/{{ $kelass->id_kelas }}/edit" class="btn btn-outline-success">Sunting</a>
                                <form action="kelas/{{ $kelass->id_kelas }}" class="d-inline" method="post">
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
