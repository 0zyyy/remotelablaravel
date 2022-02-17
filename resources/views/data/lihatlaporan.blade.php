@extends('layouts.utama')

@section('container')
    <div class="pagetitle">
        <h1>Data Laporan Mahasiswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item">Laporan Praktikum</li>
                <li class="breadcrumb-item active">Pengaturan Kecepatan</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Praktikum</h5>
                                        <table class="table" id="hasil">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">NRP</th>
                                                    <th scope="col">Status Laporan</th>
                                                    <th scope="col">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $mahas)
                                                    <tr>
                                                        <td>{{ $mahas->name }}</td>
                                                        <td>{{ $mahas->nrp }}</td>
                                                        <td><span class="badge bg-success">Sudah Mengumpulkan</span></td>
                                                        <td><a href="hasil.php?id="><button
                                                                    class="btn btn-primary">Lihat</button></a>
                                                            <a href="../hasilpraktikum/" download><button
                                                                    class="btn btn-primary ">Download</button></a>
                                                        </td>
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
    </section>s
@endsection
