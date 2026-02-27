<div>


    <section>
        <h1 class=" font-bold text-lg mb-4">History Quiz Attempt</h1>
        <div id="chart" class=" h-96 w-full"></div>
    </section>

@script
    <script>
         const options = {
            series: [{
            name: 'Score',
            data: @json($this -> totalAttemptPerMonth)
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: @json($this -> months),
                position: 'bottom',
                axisBorder: {
                    show: false
                },
            axisTicks: {
                show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return val + " Percobaan";
                }
            }

        },
        title: {
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

        const chart = new ApexCharts(document.getElementById('chart'), options)
        chart.render()
    </script>
@endscript
</div>
