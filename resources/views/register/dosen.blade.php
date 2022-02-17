@extends('layouts.main')

@section('container')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.php" class="logo d-flex align-items-center w-auto">
                            <img img src="assets/img/logo-its.png" alt="">
                            <span class="d-none d-lg-block">Remote Laboratory <h6>Praktikum Online</h6></span>
                        </a>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">BUAT AKUN DOSEN</h5>
                            </div>
                            <form class="row g-3 needs-validation" method="POST" id="form" action="/register/dosen">
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="yourName" placeholder='Nama lengkap anda' required value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">NIP/NPP</label>
                                    <input type="text" name="nrp" class="form-control @error('nrp') is-invalid @enderror"
                                        id="nrp" required placeholder='NIP/NPP anda' value="{{ old('nrp') }}">
                                    @error('nrp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="yourUsername"
                                            placeholder='example@example.com' required value="{{ old('email') }}">
                                        @error('email')
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
                                        placeholder='ketik password anda' required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('repassword') is-invalid @enderror" id="yourPassword"
                                        placeholder='Ketik ulang password anda' required>
                                    @error('repassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Sudah Memiliki akun? <a href="/login">Log in</a></p>
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
