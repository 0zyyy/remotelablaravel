@extends('layouts.utama')

@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($praktikums as $praktikum)
                        <div class="col-xxl-4 col-md-6">
                            <!-- BUAT PRAKTIKUM KE SATU -->
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $praktikum->nama_prak }} <span>Motor Induksi 3 Fasa
                                        </span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <span class="text-muted small pt-2 ps-1">{{ $praktikum->des_prak }}</span>
                                        </div>
                                    </div>
                                    <a href="/praktikum/{{ $praktikum->slug }}"
                                        class="btn btn-primary mb-2 mt-2">Lihat Praktikum</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <div class="card recent-sales">
                        <div class="card-body">
                            <h5 class="card-title">Video Pembelajaran</h5>
                            <tr>
                                <th class="ml-3">
                                    <iframe width="320" height="240" src="https://www.youtube.com/embed/AQqyGNOP_3o"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    </video>
                                </th>
                                <th class="ml-3">
                                    <iframe width="320" height="240" src="https://www.youtube.com/embed/59HBoIXzX_c"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    </video>
                                </th>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
