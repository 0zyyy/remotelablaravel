@extends('layouts.dash')
@section('container')
    <div class="pagetitle">
        <h1>{{ $praktikum->nama_prak }}</h1>
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
                                        <h6 class="card-title">{{ $praktikum->nama_prak }}</h6>
                                        <h5>Nama : {{ $user->name }}</h5>
                                        <h5>NRP : {{ $user->nrp }}</h5>
                                        <!-- Table with stripped rows -->
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Tabel Hasil Praktikum</h5>
                                                <table class="table" id="mauexport">
                                                    <thead>
                                                        <div class="row align-items-end">
                                                            <div class="col" style="margin-left:75%">
                                                                <form action="#" method="POST">
                                                                    <input type="date" name="tgl1">
                                                                    <input type="submit" class="btn btn-primary btn-xl"
                                                                        name="tampilkan" value="CARI">
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <tr>
                                                            <th scope="col">Waktu(s)</th>
                                                            <th scope="col">Frekuensi(Hz)</th>
                                                            <th scope="col">Kecepatan Medan Putar Stator (RPM)</th>
                                                            <th scope="col">Kecepatan Rotor (RPM)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($hasilprak as $hasil)
                                                            <tr>
                                                                <td>{{ $hasil->Detik }}</td>
                                                                <td>{{ $hasil->Frekuensi }}</td>
                                                                <td>{{ $hasil->Kecepatan_Stator }}</td>
                                                                <td>{{ $hasil->Kecepatan_Rotor }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    //   'csv', 'excel', 'pdf', 'print',
                    {
                        extend: 'excelHtml5',
                        title: 'Hasil Praktikum'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Hasil Praktikum'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Hasil Praktikum'
                    },
                    {
                        extend: 'print',
                        title: 'Hasil Praktikum'
                    }
                ]
            });
        });
    </script>
@endsection
