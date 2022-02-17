@extends('layouts.main')

@section('container')
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>Error</h1>
        <h2>{{ $message }}</h2>
        <a class="btn" href="/dashboard">Kembali ke dashboard</a>
        <img src="{{ asset('img/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found">
    </section>
@endsection
