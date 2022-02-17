@extends('layouts.main')

@section('container')
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '# of Votes',
                    data: [],
                    backgroundColor: [
                        'rgba(255, 99, 0, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 0, 7)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        $.getJSON("/grafik", function(data) {
            $.each((data), function(key, value) {
                console.log(data);
                myChart.options.data.labels.push(value[0]);
                myChart.options.data.datasets[0].data.push(value[1]);
            });
            myChart.update();
            updateChart();
        });

        function updateChart() {
            $.getJSON("/grafik", function(data) {
                myChart.options.data.datasets[0].data = [];
                $.each((data), function(key, value) {
                    console.log(value);
                    myChart.options.data.labels.push(value[0].);
                    myChart.options.data.datasets[0].data.push(value[1]);
                });
                myChart.update();
            });
        }
    </script>
@endsection
