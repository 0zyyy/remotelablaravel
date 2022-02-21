@extends('layouts.dash')
@section('container')
    <div class="card-title">
        <h1 class="title">Upload</h1>
        <span class="badge bg-info text-dark mb-3">Info</span>
        <h5 class="title">Pastikan Format File dan Nama File, sudah sesuai dengan ketentuan.</h5>
    </div>
    <div class="card p-4">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gy-4">
                <div class="col-md-6">
                    <label for="#nama" class="mb-2">Nama Mahasiswa</label>
                    <input name="nama" class="form-control mt-3" type="hidden" aria-label="default input example"
                        value="{{ $nama }}">
                    <label name="nama" class="form-control"
                        aria-label="default input example">{{ $nama }}</label>
                </div>
                <div class="col-md-6 ">
                    <label for="#nrp" class="mb-2">NRP Mahasiswa</label>
                    <!--<input type="text" class="form-control" name="nrp" placeholder="NRP Anda" required id="nrp">-->
                    <input name="nrp" class="form-control mt-3" type="hidden" aria-label="default input example"
                        value="{{ $nrp }}">
                    <label name="nrp" class="form-control"
                        aria-label="default input example">{{ $nrp }}</label>
                </div>
                <div class="col-lg-12">
                    <select name="praktikum" id="praktikum" class="form-control">
                        <option value="">Pilih Praktikum</option>
                        <option value="1">Praktikum Mengatur Kecepatan</option>
                        <option value="2">Praktikum Karakteristik Beban</option>
                        <option value="3">Praktikum Pengaturan Kecepatan (Closed Loop)</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label for="file" class="mb-2">Pilih File</label>
                    <input type="file" name="berkas" id="berkas" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="uploadBtn" name="uploadBtn">UPLOAD</button>
            </div>
        </form>
    </div>
@endsection
