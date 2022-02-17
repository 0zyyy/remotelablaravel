@extends('layouts.utama')

@section('container')
    <div class="pagetitle mt-3 px-3">
        <h1>Praktikum</h1>
    </div>
    <div class="row ml-2 justify-content-center align-item-center text-center">
        <div class="card">
            <div class="card col-lg-12 mt-4 p-4 text-start">
                <h3>Data Praktikan</h1>
                    <div class="row">
                        <h4>Nama : Bakekok</h4>
                        <h4>NRP : Bakekok</h4>
                        <h4>Jenis Praktikum : Bakekok</h4>
                    </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card px-2">
                <div class="card-body">
                    <div class="card-title">Grafik Monitor RPM</div>
                    <div id="chartContainer" style="height: 250px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card px-2">
                <div class="card-body">
                    <div class="card-title">Grafik Monitor Frekuensi</div>
                    <div id="frekuensi" style="height: 250px; width: 100%;"></div>
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
                var frekuensiChart = new CanvasJS.Chart("frekuensi", {
                    title: {
                        text: "Monitor Kecepatan Frekuensi",
                        fontFamily: 'sans-serif',
                    },
                    data: [{
                        type: "line",
                        dataPoints: [],
                    }],
                    axisY: {
                        title: "Frekuensi (Hz)",
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

                $.getJSON("/grafik", function(data) {
                    $.each((data), function(key, value) {
                        chart.options.data[0].dataPoints.push({
                            label: value[0],
                            y: parseInt(value[1])
                        });
                        frekuensiChart.options.data[0].dataPoints.push({
                            label: value[0],
                            y: parseInt(value[2])
                        });
                    });
                    chart.render();
                    frekuensiChart.render();
                    updateChart();
                });

                function updateChart() {
                    $.getJSON("/grafik", function(data) {
                        chart.options.data[0].dataPoints = [];
                        frekuensiChart.options.data[0].dataPoints = [];
                        $.each((data), function(key, value) {
                            chart.options.data[0].dataPoints.push({
                                label: value[0],
                                y: parseInt(value[1])
                            });
                            frekuensiChart.options.data[0].dataPoints.push({
                                label: value[0],
                                y: parseInt(value[2])
                            });
                        });
                        chart.render();
                        frekuensiChart.render();
                    });
                }
                setInterval(function() {
                    updateChart()
                }, 10000);
            }
        </script>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Monitoring</h4>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="mauexport">
                            <thead class="thead-light">
                                <tr>
                                    <th>Frekuensi</th>
                                    <th>Beban Lampu</th>
                                    <th>Kecepatan Medan Putar Stator</th>
                                    <th>Kecepatan Rotor</th>
                                    <th>Arus Motor</th>
                                    <th>Tegangan Motor</th>
                                    <th>Tegangan Generator</th>
                                    <th>Arus Generator</th>
                                </tr>
                            </thead>
                            <tbody id="tabel">
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                function ambilData() {
                                    $.ajax({
                                        type: "GET",
                                        url: "/table",
                                        data: {
                                            trig: "1"
                                        },
                                        success: function(data) {
                                            $('#tabel').html(data);
                                        }
                                    })
                                }
                                setInterval(function() {
                                    ambilData()
                                }, 1000)
                            })
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ml-2 justify-content-center align-item-center text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Live Stream</h4>
                            <iframe width="100%" height="480" src="https://www.youtube.com/embed/A4bUk5JtTUc"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
