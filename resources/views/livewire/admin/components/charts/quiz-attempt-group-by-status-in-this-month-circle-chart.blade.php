<div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Attempts</div>
                    <div class="text-xs text-slate-500">Total submissions</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 22c5.5 0 10-4.5 10-10S17.5 2 12 2 2 6.5 2 12s4.5 10 10 10z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>

            <div id="chart-quiz-status" class=""></div>
    </div>

@script
    <script>
        const  options = {
          series: @json($this -> totalQuizAttemptGroupByPerMonth),
          chart: {
          height: 200,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '50%',
            }
          },
        },
        labels: @json($this -> status),
        };

        const chart = new ApexCharts(document.getElementById("chart-quiz-status"), options);

        chart.render();
    </script>
@endscript
