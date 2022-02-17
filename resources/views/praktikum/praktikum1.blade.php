@extends('layouts.utama')


@section('container')
    <div class="pagetitle mt-3 px-3">
        <h1 class="mb-2">{{ $title }}</h1>
        <nav>
            <div class="row d-flex justify-content-between">
                <div class="col-lg-2">
                    Bakekok Bunda
                </div>
                <div class="col-lg-3 text-end">
                </div>
            </div>
        </nav>
    </div>
    <div class="row ml-2 justify-content-center align-item-center text-center">
        <div class="col-lg-6">
            <div class="card px-2">
                <div class="card-body">
                    <div class="card-title">Grafik Monitor RPM</div>
                    <div id="chartContainer" style="height: 250px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Monitor Kecepatan Rotor",
                        fontFamily: 'sans-serif',
                    },
                    data: [{
                        type: "line",
                        dataPoints: [],
                    }],
                    axisY: {
                        title: "RPM",
                        titleFontSize: 20,
                        minimum: 0,
                        fontFamily: 'sans-serif',
                    },
                    axisX: {
                        title: "Waktu (s)",
                        fontSize: 5,
                        titleFontSize: 20,
                        minimum: 0,
                        fontFamily: 'sans-serif',
                    },
                });

                $.getJSON("../data/service.php", function(data) {
                    $.each((data), function(key, value) {
                        chart.options.data[0].dataPoints.push({
                            label: value[0],
                            y: parseInt(value[1])
                        });
                    });
                    chart.render();
                    updateChart();
                });

                function updateChart() {
                    $.getJSON("../data/service.php", function(data) {
                        chart.options.data[0].dataPoints = [];
                        $.each((data), function(key, value) {
                            chart.options.data[0].dataPoints.push({
                                label: value[0],
                                y: parseInt(value[1])
                            });
                        });
                        chart.render();
                    });
                }
                setInterval(function() {
                    updateChart()
                }, 1000);
            }
        </script>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Monitoring</h4>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="mauexport">
                            <thead class="thead-light">
                                <tr>
                                    <th>Frekuensi</th>
                                    <th>Kecepatan Medan Putar Stator</th>
                                    <th>Kecepatan Rotor</th>
                                    <th>Arus Motor</th>
                                    <th>Tegangan Motor</th>
                                </tr>
                            </thead>
                            <tbody id="tabel">
                            </tbody>
                        </table>
                        <script>
                            // $(document).ready(function() {
                            //     function ambilData() {
                            //         $.ajax({
                            //             type: "POST",
                            //             url: "../_actions/ambilDataTabel.php",
                            //             data: {
                            //                 trig: "1"
                            //             },
                            //             success: function(data) {
                            //                 $('#tabel').html(data);
                            //             }
                            //         })
                            //     }
                            //     setInterval(function() {
                            //         ambilData()
                            //     }, 1000)
                            // })
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><i class="bi bi-question-circle" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Arahkan mouse pada bagian tengah knob, jika ingin menambah frekuensi drag ke atas, drag ke bawah jika ingin mengurangi frekuensi"></i>
                                1. Knob Frekuensi (Hz)</h4>
                            <div class="row">
                                <svg class="knob" id="knob-bs2" style="width: 200px; margin:0 auto;"></svg>
                            </div>
                            <button class="btn btn-primary hertz" name="hertz" id="hertz">Ganti Frekuensi</button>
                            <script>
                                let Knob = svgKnob.default;
                                $(document).ready(function() {
                                    const k = new Knob('#knob-bs2', {
                                        bg: true,
                                        track: true,
                                        track_bg: true,
                                        cursor: true,
                                        markers: 5,
                                        markers_width: 1,
                                        initial_value: 3,
                                        value_min: 0,
                                        value_max: 50
                                    });
                                    const val = document.getElementsByClassName('knob-value'); // value of the knob
                                    var nilai_hertz;
                                    const knobs_elem = document.getElementsByClassName("knob"); // knobs DOM elements
                                    for (let i = 0; i < knobs_elem.length; i++) {
                                        knobs_elem[i].addEventListener("mouseup", function() {
                                            nilai_hertz = parseInt(val[i].textContent);
                                        });
                                    }
                                    $('.hertz').click(function(e) {
                                        $.ajax({
                                            type: "POST",
                                            url: "../_actions/sendHertz.php",
                                            data: {
                                                hertz: nilai_hertz
                                            },
                                            success: function() {
                                                const Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });

                                                Toast.fire({
                                                    icon: 'success',
                                                    title: 'Frekuensi berhasil diubah'
                                                })
                                            }
                                        })
                                        e.preventDefault();
                                    })
                                })
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">2. Tombol Start/Stop</h4>
                            <div class="row">
                                <h5 for="forward">Forward Start</h5>
                                <div class="col-lg-12 mb-2">
                                    <button class="btn btn-primary maju text-center" value="1" name="forward" id="forward">
                                        Forward Start</button>
                                    <script>
                                        $('.maju').click(function() {
                                            console.log('Terclick');
                                            $.ajax({
                                                type: "post",
                                                url: "{{ route('motor.start') }}",
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    start: $(".forward").attr('value')
                                                },
                                                success: function(response) {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000
                                                    });
                                                    console.log('BIsakok');
                                                    if (response.status) {
                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: 'Forward Start'
                                                        })
                                                    } else {
                                                        Toast.fire({
                                                            icon: 'error',
                                                            title: 'Terjadi Kesalahan'
                                                        })
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                <h5 for="reverse">Reverse Start</h5>
                                <div class="col lg-12 mb-2">
                                    <button class="btn btn-primary reverse text-center" value="1" name="reverse"
                                        id="reverse">Reverse Start</button>
                                </div>
                                <h5 for="stop">Stop</h5>
                                <div class="col lg-12 mb-2">
                                    <button class="btn btn-primary stop text-center" value="0" name="stop"
                                        id="stop">Stop</button>
                                    <script>
                                        $('.stop').click(function() {
                                            console.log('Terclick');
                                            $.ajax({
                                                type: "post",
                                                url: "{{ route('motor.stop') }}",
                                                data: {
                                                    start: $(".forward").attr('value')
                                                },
                                                success: function(response) {
                                                    const Toast = Swal.mixin({
                                                        toast: true,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000
                                                    });
                                                    console.log('BIsakok');
                                                    if (response.status) {
                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: 'Forward Start'
                                                        })
                                                    } else {
                                                        Toast.fire({
                                                            icon: 'error',
                                                            title: 'Terjadi Kesalahan'
                                                        })
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">3. Live Stream</h4>
                    <iframe width="100%" height="560" src="https://www.youtube.com/embed/A4bUk5JtTUc"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    </video>
                </div>
            </div>
        </div>
        <form method="POST">
            @csrf
            <div class="align-items-center">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    SELESAI
                </button>
                <div class="row ml-2 justify-content-center align-item-center text-center">
                    <form method="POST">
                        @csrf
                        <div class="modal fade" id="verticalycentered" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn btn-success"><i
                                                class="bi bi-check-circle"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        PRAKTIKUM TELAH SELESAI. SILAHKAN MENGHUBUNGI DOSEN
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="selesai"
                                            id="selesai">YA</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('.selesai').click(function(e) {
                                $.ajax({
                                    type: "POST",
                                    url: "../_actions/SendStopSelesai.php",
                                    data: {
                                        start: $(".selesai").attr('value')
                                    },
                                    success: function() {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Motor akan berhenti. Praktikum Telah Selesai'
                                        })
                                    }
                                })
                                e.preventDefault();
                            })
                        })
                    </script>
                </div>
            </div>
        </form>
    </div>
@endsection
