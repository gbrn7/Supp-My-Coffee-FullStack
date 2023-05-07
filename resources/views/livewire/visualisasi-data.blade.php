<div class="row">
    <div class="col-10 p-3 rounded rounded-3 mt-3 chart-wrapper">
        {{-- content --}}
        <canvas id="myChart"></canvas>
    </div>
</div>

{{-- Javascript --}}
@push('js')

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        let chartData = JSON.parse('<?php echo $products ?>');
        const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                        labels: chartData.label,
                        datasets: [{
                            label: '# of Votes',
                            data: chartData.data,
                            backgroundColor: "rgba(241, 222, 201, 0.4)",
                            borderColor: "rgba(241, 222, 201, 0.8)",
                            borderWidth: 2,
                            hoverBackgroundColor: "rgba(241, 222, 201, 0.8)",
                            hoverBorderColor: "rgba(241, 222, 201, 1)",
                        }]
                        },
                        options:{
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bar Chart Penjualan 7 hari Terakhir',
                                    color : '#B8621B',
                                    font: {
                                        size : 14
                                    }
                                }
                            },

                            maintainAspectRatio: false,
                            responsive: true,
                            scales: {
                                y: {
                                stacked: true,
                                grid: {
                                    display: true,
                                    color: "rgba(255,99,132,0.2)"
                                },
                                ticks:{
                                    color : '#B8621B'
                                }
                                },
                                x: {
                                grid: {
                                    display: false
                                },
                                ticks:{
                                    color : '#B8621B'
                                }
                            }
                        }
                        }
        }); 

        var updateChart = function() {
            $.ajax({
            url: "{{ route('api.chart') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                myChart.data.labels = data.labels;
                myChart.data.datasets[0].data = data.data;
                myChart.update();
                // console.log(data);
            },
            error: function(data){
                console.log(data);
            }
            });
        }

        setInterval(() => {
            updateChart();
        }, 3000);

    </script>
@endpush
