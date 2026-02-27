    <div>

    <section class=" flex flex-col gap-4">
        <h1 class=" font-bold text-lg mb-4">History Quiz Score</h1>

        <div id="chart2" class=" h-96 w-full"></div>
    </section>

@script
    <script>
         const options = {
            series: [{
            name: 'Score',
            data: @json($this -> totalScorePerMonth)
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
                    return val + " Score";
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
                    return val + " Score";
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

        const chart = new ApexCharts(document.getElementById('chart2'), options)
        chart.render()
    </script>
@endscript
    </div>
