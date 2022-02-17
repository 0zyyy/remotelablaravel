@extends('layouts.utama')
@section('container')
    <div class="pagetitle">
        <h1>Mulai Praktikum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Praktikum</li>
                <li class="breadcrumb-item">Mulai Praktikum</li>
                <li class="breadcrumb-item active">{{ $praktikum->nama_prak }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="text-center">
        <!-- <img src="img/think.svg" style="max-height: 90px"> -->
        <div class="pt-4 pb-4">
            <h5 class="card-title text-center pb-0 fs-4">{{ $praktikum->nama_prak }}</h5>
            <h4 class="card-title text-center pb-0 fs-4">Mata Kuliah: {{ $praktikum->matkul }}</h4>
            <p class="text-center big">Dosen : {{ $praktikum->dosen_prak }}.</p>
        </div>
    </div>
    <div class="row">
        <h4>Langkah Pengerjaan</h4>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6> -->
                    {!! $praktikum->langkah_peng !!}
                    <!-- <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum reprehenderit maxime eligendi. Aspernatur magnam maxime cupiditate molestias ipsum earum facilis veniam tempora dolore sequi, exercitationem ad ex rerum facere vero.</h6> -->
                </div>
            </div>
            <h4>Modul Praktikum</h4>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="container">
                            <div class="row">
                                <div class="col py-2">
                                    Modul Praktikum
                                    <span><a href="/files/prosedur.pdf"
                                            class="btn btn-primary rounded-pill btn-sm">Download</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    Mulai Praktikum
                </button>
                <div class="modal fade" id="verticalycentered" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-danger"><i
                                        class="bi bi-exclamation-octagon"></i></button>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda sudah membaca Langkah Pengerjaan dan Modul Praktikum dengan seksama ? Jika
                                sudah, silahkan melakukan Praktikum
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    name="batal">BATAL</button>
                                <form action="/praktikum/{{ $praktikum->slug }}/mulaipraktikum" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="start"> YA</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
