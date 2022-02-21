@extends('layouts.utama')

@section('container')
    <div class="pagetitle">
        <h1>Data Hasil Praktikum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Hasil Praktikum</li>
                <li class="breadcrumb-item active">{{ $praktikum->nama_prak }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Hasil Praktikum</h5>
                                        <!-- Table with stripped rows -->
                                        <table class="table" id="hasil">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Status Praktikum</th>
                                                    <th scope="col">Lihat Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $mahas)
                                                <tr>
                                                    <td>{{ $mahas->name }}</td>
                                                    <td>{{ $mahas->nrp }}</td>
                                                    <td><span class=" badge bg-success">Sudah Praktikum</span></td>
                                                    <td><a href="/data/hasilpraktikum/{{ $praktikum->slug }}/{{ $mahas->id }}"><button
                                                                class="btn btn-primary">Lihat</button></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#hasil').dataTable({
                                                        "oLanguage": {
                                                            "sSearch": "Cari:",
                                                            "sZeroRecords": "Tidak ada data pencarian",
                                                            "sLengthMenu": "Menampilkan _MENU_ data",
                                                            "sInfo": "Total ada _TOTAL_ data untuk ditampilkan (_START_ sampai _END_)",
                                                            "sNext": "Berikutnya",
                                                            "sPrevious": "Sebelumnya",
                                                        }
                                                    });
                                                });
                                            </script>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
@endsection
