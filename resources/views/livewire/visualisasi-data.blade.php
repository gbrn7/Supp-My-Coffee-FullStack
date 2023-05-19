<div class="row">
    <div class="col-10 p-3 rounded rounded-3 mt-3 chart-wrapper">
        {{-- content --}}
        <canvas id="myChart"></canvas>
    </div>
    <div class="col-10 p-3 rounded rounded-3 mt-3 chart-wrapper">
        {{-- content --}}
        <canvas id="myChart2"></canvas>
    </div>
</div>

{{-- Javascript --}}
@push('js')

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');
        
        let chartDataPerWeek = JSON.parse('<?php echo $transactionsPerWeek ?>');
        const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                        labels: chartDataPerWeek.label,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: chartDataPerWeek.data,
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

        const ctx2 = document.getElementById('myChart2');
        let chartDataPerMonth = JSON.parse('<?php echo $transactionsPerMonth ?>');
        const myChart2 = new Chart(ctx2, {
                        type: 'line',
                        data: {
                        labels: chartDataPerMonth.label,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: chartDataPerMonth.data,
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
                                    text: 'Bar Chart Penjualan 12 Bulan Terakhir',
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
                console.log(data.transactionsPerWeek, data.transactionsPerMonth);
                myChart.data.labels = data.transactionsPerWeek.label;
                myChart.data.datasets[0].data = data.transactionsPerWeek.data;
                myChart.update();

                myChart2.data.labels = data.transactionsPerMonth.label;
                myChart2.data.datasets[0].data = data.transactionsPerMonth.data;
                myChart2.update();
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
