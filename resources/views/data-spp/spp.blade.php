@extends('layouts.dashboard')

@section('content')
        <main id="main" class="main">
            <div class="pagetitle">
                    <h1>Data Spp</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Data Spp</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <a href="/data-spp/buatdataspp" class="btn btn-primary mt-4 mb-2">Tambah Data</a>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                            <tbody> @foreach ($spp as $i => $s)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $s->tahun }}</td>
                            <td>{{ $s->nominal }}</td>
                            <td><a href="spp/{{ $s->id_spp }}/edit" class="btn btn-outline-success">Sunting</a>
                                <form action="spp/{{ $s->id_spp }}" class="d-inline" method="post">
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
