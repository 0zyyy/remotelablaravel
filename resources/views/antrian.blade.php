@extends('layouts.dash')
@section('container')
    <div class="pagetitle">
        <h1>Antrian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Antrian</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        @if (session()->has('success'))
            <div class="alert alert-success dismissable fade show">
                {{ session()->get('success') }}
            </div>
        @endif
        @if ($antrian->firstWhere('id_user', Auth::user()->id) == null || $antrian->firstWhere('hak','mahasiswa'))
            <form action="/dashboard/antrian" method="POST">
                @csrf
                <button class='btn btn-primary' style='color:white' type="submit"><i class='bi bi-ticket-detailed'></i>
                    Ambil Nomor Antrian</button>
            </form>
        @endif
        <div class="card-body">
            <h5 class="card-title">ANTRIAN</h5>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">No. Antrian</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Waktu Ambil Antrian</th>
                        <th scope="col">Praktikum</th>
                        @if (auth()->user()->hak == 'admin')
                            <th scope='col'>Opsi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($antrian as $antri)
                        <tr>
                            <td>{{ $antri->nomor_antrian }}</td>
                            <td>{{ $antri->user->name }}</td>
                            <td>{{ $antri->waktu_masuk }}</td>
                            <td>{{ $antri->id_praktikum }}</td>
                            @if (auth()->user()->hak == 'admin')
                                <form action="/dashboard/antrian/{{ $antri->user->id }}" method="GET">
                                    @csrf
                                    <td><button class='btn btn-danger'>Hapus</button></td>
                                </form>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
