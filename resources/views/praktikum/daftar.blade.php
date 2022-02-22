@extends('layouts.dash')

@section('container')
    <div class="pagetitle">
        <h1>Semua Praktikum</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Praktikum</li>
                <li class="breadcrumb-item">Semua Praktikum</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body pt-4">
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active profile-overview">
                    <h5 class="class-title">Daftar Praktikum</h5>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success mb-5">Tambah Praktikum</button>
                    </div>
                    @foreach ($praktikums as $praks)
                    <div class="card bg-info text-white rounded-5">
                        <div class="card-body d-flex justify-content-between m-4">
                            <h5>{{ $praks->nama_prak }}</h5>
                            <h5>bakekok</h5>
                            <button class="btn btn-success">Buka</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
