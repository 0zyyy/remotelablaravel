@extends('layouts.main')
{{ session()->has($status)}}
@section('container')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">

                        <a href="index.php" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo-its.png" alt="">
                            <span class="d-none d-lg-block">Remote Laboratory <h6>Praktikum Online</h6></span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                @if (session()->has('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if(session()->has('email'))
                                    <div class="alert alert-danger">
                                        {{ session('email') }}
                                    </div>
                                @endif

                                <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                <p class="text-center small">Masukkan Email</p>
                            </div>
                            <form class="row g-3 needs-validation" method="POST" action="/forgot-password">
                                @csrf
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="email" name="email" class="form-control" id="yourUsername" required>
                                        <div class="invalid-feedback">Please enter your Email</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" name="login">Kirim Password Reset Ke
                                        Email</button>
                                </div>
                                <div class="col-12">
                                    <a href="login.php">Kembali</a>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Belum punya akun? Buat akun<a href="registerdosen.php">
                                            DOSEN</a>/<a href="registermahasiswa.php">MAHASISWA</a></p>
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
