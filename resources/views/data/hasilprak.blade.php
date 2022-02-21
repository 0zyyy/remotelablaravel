@extends('layouts.dash')

@section('container')
    <div class="pagetitle">
        <h1>Hasil Praktikum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Hasil Praktikum</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hasil Praktikum</h5>
                        <span class="badge bg-info text-dark mb-4">Info</span>
                        <p>Silahkan Klik Praktikum yang ingin anda ketahui hasilnya</p>
                        <div class="list-group">
                            @foreach ($praktikum as $prak)
                                <a href="/data/hasilpraktikum/{{ $prak->slug }}"><button type="button"
                                    class="list-group-item list-group-item-action ">{{ $prak->nama_prak }}</button></a>
                            @endforeach
                            {{-- <a href="datastarting.php "> 
                            <a href="datagenerator.php "> <button type="button"
                                    class="list-group-item list-group-item-action">Karakteristik Beban</button></a>
                            <button type="button" class="list-group-item list-group-item-action">Pengaturan
                                Kecepatan (Closed Loop)</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
