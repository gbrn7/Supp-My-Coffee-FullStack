<div class="row">
    <div class="col-10 p-3 rounded rounded-3 mt-2 chart-wrapper">
        {{-- content --}}
        <canvas id="myChart"></canvas>
    </div>
    <div class="bottom-wrapper col-10 d-lg-flex">
        <div class="col-12 split-content p-3 rounded rounded-3 mt-2 chart-wrapper">
            {{-- content --}}
            <canvas id="myChart2"></canvas>
        </div>
        <div class="col-12 split-content d-flex justify-content-between col-lg-6 p-3 rounded rounded-3 mt-2 info-wrapper">
            <div class="box ">
                <div class="col-12 gap-3 content-wrapper">
                    <div class="col-2 col-lg-4  text-center logo-wrapper">
                        <img loading="lazy" src="{{ asset('Assets/img/Money.svg')}}" class="img-fluid" />
                    </div>
                    <div class="col-12 text">
                        <div class="title text-center">Total Penjualan</div>
                        <div class="desc mt-1 text-center revenue"
                        >Rp.{{$revenue}}</div>
                    </div>
                </div>
            </div> 
            <div class="box ">
                <div class="col-12 gap-3 content-wrapper">
                    <div class="col-2 col-lg-4  text-center logo-wrapper">
                        <img loading="lazy" src="{{ asset('Assets/img/CoffeeBeans.svg')}}" class="img-fluid" />
                    </div>
                    <div class="col-12 text">
                        <div class="title text-center">Total Produk Terjual</div>
                        <div class="desc mt-1 text-center totalPenjualan">{{$totalPenjualan}} Produk</div>
                    </div>
                </div>
            </div> 
            <div class="box ">
                <div class="col-12 gap-3 content-wrapper">
                    <div class="col-4 col-lg-4  text-center logo-wrapper">
                        <img loading="lazy" src="{{ asset('Assets/img/user-solid-24.png')}}" class="img-fluid" />
                    </div>
                    <div class="col-12 text">
                        <div class="title text-center">Jumlah Customer</div>
                        <div class="desc mt-1 text-center totalCustomer">{{$totalCustomer}} Orang</div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

{{-- Javascript --}}
@push('js')

  <!-- Pure Counter JS -->
  <script src="{{ asset('Assets/Vendor/purecounterjs-main/dist/purecounter_vanilla.js') }}"></script>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        {{-- Bar Chart Config --}}
        const ctx = document.getElementById('myChart');
        let chartDataPerWeek = JSON.parse('<?php echo $transactionsPerWeek ?>');
        const dataBarChart = {
                        type: 'bar',
                        data: {
                        labels: chartDataPerWeek.label,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: chartDataPerWeek.data,
                            backgroundColor: "rgba(241, 222, 201, 0.4)",
                            borderColor: "rgba(241, 222, 201, 0.8)",
                            borderWidth: 2,
                            hoverBackgroundColor: "rgb(a241, 222, 201, 0.8)",
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
                            animation :{
                                duration : 1500,
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
        }
        let myChart;

        {{-- Line Chart Config --}}
        const ctx2 = document.getElementById('myChart2');
        let chartDataPerMonth = JSON.parse('<?php echo $transactionsPerMonth ?>');
        const dataLineChart = {
                        type: 'line',
                        data: {
                        labels: chartDataPerMonth.label,
                        datasets: [{
                            label: 'Total Transaksi',
                            data: chartDataPerMonth.data,
                            backgroundColor: "rgba(241, 222, 201, 0.4)",
                            borderColor: "rgba(241, 222, 201, 1)",
                            borderWidth: 3,
                        }]
                        },
                        options:{
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Line Chart Penjualan 12 Bulan Terakhir',
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
                                beginAtZero: true,
                                grid: {
                                    display: true,
                                    color: "rgba(255,99,132,0.2)"
                                },
                                ticks:{
                                    color : '#B8621B'
                                }
                                },
                                x: {
                                beginAtZero: false,
                                grid: {
                                    display: false
                                },
                                ticks:{
                                    color : '#B8621B'
                                }
                                },
                            },
                            animation : {
                                duration : 1500,
                            },
                            transitions: {
                                show: {
                                    animations: {
                                    x: {
                                        from: 0
                                    },
                                    y: {
                                        from: 0
                                    }
                                    }
                                },
                                hide: {
                                    animations: {
                                    x: {
                                        to: 0
                                    },
                                    y: {
                                        to: 0
                                    }
                                    }
                                }
                            },
                        }
        }
        let myChart2;
        
        onload = () => {
        let x = document.querySelector(".sidebar");
        let y = document.querySelector(".footer-wrapper");
        let z = document.querySelector(".content");
        let headBg = document.querySelector(".header-bg");
        let load = document.querySelector(".loading-wrapper");
        setTimeout(() => {
            x.classList.remove("d-none");
            y.classList.remove("d-none");
            z.classList.remove("d-none");
            headBg.classList.remove("d-none");
            load.classList.add("close");    
            myChart = new Chart(ctx, dataBarChart);
            myChart2 = new Chart(ctx2, dataLineChart);
            new PureCounter();
            // console.log('test');
        }, 1000);

        setTimeout(() => {
            body.removeChild(load);
        }, 2000);

        
        };

        {{-- Update Chart --}}
        var updateChart = function() {
            $.ajax({
            url: "{{ route('api.chart') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // console.log(data.transactionsPerWeek.label);
                // console.log(myChart);
                myChart.data.labels = data.transactionsPerWeek.label;
                myChart.data.datasets[0].data = data.transactionsPerWeek.data;
                myChart.update();

                myChart2.data.labels = data.transactionsPerMonth.label;
                myChart2.data.datasets[0].data = data.transactionsPerMonth.data;
                myChart2.update();

                let x = document.querySelector(".revenue");
                let y = document.querySelector(".totalPenjualan");
                let z = document.querySelector(".totalCustomer");

                // console.log(x,y,z, data);
                // console.log(data.revenue, data.totalPenjualan, data.totalCustomer);
                x.innerHTML = "Rp." + data.revenue;
                y.innerHTML = data.totalPenjualan + " Produk";
                z.innerHTML = data.totalCustomer + " Orang";
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
