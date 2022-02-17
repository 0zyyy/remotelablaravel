@extends('layouts.main')

@section('container')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.php" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('/img/logo-its.png') }}" alt="">
                            <span class="d-none d-lg-block">Remote Laboratory<h6>Praktikum Online</h6></span>
                        </a>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
                                <p class="text-center small">Masukkan NIP/NRP/NPP dan password</p>
                            </div>
                            <form class="row g-3 needs-validation" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">NIP/NRP/NPP</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="nrp"
                                            class="form-control @error('nrp') is-invalid @enderror" id="yourUsername"
                                            required>
                                        @error('nrp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="yourPassword"
                                        required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <a href="/forgot-password">Lupa Password</a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Belum punya akun? Buat akun<a href="/register/dosen">
                                            DOSEN</a>/<a href="/register/mahasiswa">MAHASISWA</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="credits">
                        Developed by <strong><span>Team Remote Laboratory</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
