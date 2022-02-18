@extends('layouts.dash')

@section('container')
    <div class="pagetitle">
        <h1>Pengaturan Akun</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Pengaturan Akun</li>
            </ol>
        </nav>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-12 flex-row align-items-center justify-content-between">
                        <form method="POST" enctype="multipart/form-data" action="/settings">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Ubah Foto Profil</label>
                                <div class="custom-file">
                                    <input type="file" id="profilePic" name="img">
                                    <button class="btn btn-primary mb-3 mt-3" name="upload"><i
                                            class="bi bi-cloud-upload-fill"></i> Upload</button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput">Ubah Email</label>
                                <input type="text" class="form-control" id="EmailPengguna" placeholder="Email"
                                    name="email">
                            </div>
                            <div class="form-group mb-4">
                                <label for="formGroupExampleInput2">Ubah Password</label>
                                <input type="password" class="form-control" id="PasswordPengguna" placeholder="Password"
                                    name="password">
                            </div>
                            <button class="btn btn-primary mt-4" name="submit" id="submit">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
