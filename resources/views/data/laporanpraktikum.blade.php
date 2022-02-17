@extends('layouts.utama')

@section('container')
    <div class="pagetitle">
        <h1>Laporan Praktikum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Laporan Praktikum</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Praktikum</h5>
                        <span class="badge bg-info text-dark mb-4">Info</span>
                        <p>Silahkan Klik Praktikum yang ingin anda ketahui laporan per mahasiswa</p>
                        <div class="list-group">
                            @foreach ($praktikum as $prak)
                            <a href="/lihatlaporan/{{ $prak->slug }}"><button type="button"
                                class="list-group-item list-group-item-action">{{ $prak->nama_prak }}</button></a>
                            @endforeach
                            {{-- <a href="/lihatlaporan/"><button type="button"
                                    class="list-group-item list-group-item-action">Karakteristik Beban</button></a>
                            <button type="button" class="list-group-item list-group-item-action disabled">Pengaturan
                                Kecepatan (Closed Loop)</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
