<div class="p-4 md:p-6 space-y-6">
    <!-- HERO -->
    {{-- <section class="bg-gradient-to-r from-blue-600 to-slate-900 rounded-3xl p-5 md:p-6 text-white overflow-hidden relative">
        <div class="  h-40 w-40 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-10 -left-10 h-52 w-52 rounded-full bg-white/10"></div>

        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="text-xs font-semibold tracking-widest text-white/80">ADMIN OVERVIEW</div>
                <h1 class="mt-1 text-2xl md:text-3xl font-semibold tracking-tight">Dashboard</h1>
                <p class="mt-2 text-sm text-white/80 max-w-2xl">
                    Ringkasan performa quiz, users, attempts, dan leaderboard. Semua angka di bawah ini masih dummy (statis).
                </p>
            </div>
        </div>
    </section> --}}

    <!-- QUICK KPIs -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            {{-- Active Users --}}
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Total Users</div>
                    <div class="text-xs text-slate-500">Registered accounts</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M20 21a8 8 0 10-16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allUsers->count() }}</div>
                <div class="text-sm font-semibold text-emerald-600">↑ 12%</div>
            </div>
            <div class="mt-2 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                <div class="h-full w-[62%] bg-blue-600 rounded-full"></div>
            </div>
        </div>

        {{-- Active Divisi --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Active Divisi</div>
                    <div class="text-xs text-slate-500">Published Divisis</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allDivisis->count() }}</div>
            </div>
            <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
            </div>
        </div>

        {{-- Active Quiz --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Active Quizzes</div>
                    <div class="text-xs text-slate-500">Published quizzes</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $activeQuizzes->count() }}</div>
            </div>
            <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
            </div>
        </div>

        {{-- Total Material --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Total Material</div>
                    <div class="text-xs text-slate-500">Published quizzes</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allMaterials->count() }}</div>
            </div>
            <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
            </div>
        </div>

        {{-- Total Job --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Total Job</div>
                    <div class="text-xs text-slate-500">Published quizzes</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allJobs->count() }}</div>
            </div>
            <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
            </div>
        </div>

        {{-- Total Material (duplikat di code asli) --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Total Material</div>
                    <div class="text-xs text-slate-500">Published quizzes</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                        <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allMaterials->count() }}</div>
            </div>
            <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
            </div>
        </div>

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

            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">{{ $allQuizAttempts->count() }}</div>
                <div class="text-sm font-semibold text-emerald-600">↑ 25%</div>
            </div>
            <div class="mt-2 text-xs text-slate-500">Avg completion time: <span class="font-semibold text-slate-700">12m 40s</span></div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-semibold text-slate-700">Pass Rate</div>
                    <div class="text-xs text-slate-500">This month</div>
                </div>
                <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                    <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                        <path d="M4 19h16M7 16V8m5 8V5m5 11v-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-end justify-between">
                <div class="text-3xl font-semibold">45%</div>
            </div>
            <div class="mt-2 flex flex-wrap gap-2 text-xs">
                <span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-100 font-semibold">passed 45%</span>
                <span class="px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 font-semibold">failed 30%</span>
                <span class="px-2 py-1 rounded-lg bg-rose-50 text-rose-700 border border-rose-100 font-semibold">progress 25%</span>
            </div>
        </div>
    </section>

    <!-- CHARTS + SIDE INSIGHTS -->
    <section class="grid grid-cols-1 xl:grid-cols-3 gap-4">
        <!-- Line chart -->
        <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <div class="text-lg font-semibold">Activity Overview</div>
                    <div class="text-sm text-slate-500">Quizzes taken vs pass rate (dynamic)</div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-slate-700 bg-slate-50 border border-slate-200 rounded-full px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-blue-600"></span> Taken
                    </span>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-slate-700 bg-slate-50 border border-slate-200 rounded-full px-3 py-1">
                        <span class="h-2 w-2 rounded-full bg-emerald-600"></span> Pass rate
                    </span>
                </div>
            </div>

            {{-- ✅ CHANGED: SVG -> Canvas (Dynamic Chart.js) --}}
            <div class="mt-4 h-72 rounded-xl bg-slate-50 border border-slate-200 overflow-hidden p-3" wire:ignore>
                <canvas id="activityChart" class="w-full h-full"></canvas>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="rounded-xl border border-slate-200 bg-white p-3">
                    <div class="text-xs text-slate-500">Peak day</div>
                    <div class="text-sm font-semibold">{{ $peakDay ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3">
                    <div class="text-xs text-slate-500">Highest pass rate</div>
                    <div class="text-sm font-semibold">{{ $highestPassRateLabel ?? '-' }}</div>
                </div>
                <div class="rounded-xl border border-slate-200 bg-white p-3">
                    <div class="text-xs text-slate-500">Avg score</div>
                    <div class="text-sm font-semibold">{{ $avgScore ?? '-' }}</div>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="space-y-4">
            <!-- Donut -->
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-lg font-semibold">Performance</div>
                        <div class="text-sm text-slate-500">Passed / Failed / Progress</div>
                    </div>
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">This month</span>
                </div>

                <div class="mt-4 h-64 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center">
                    {{-- (Donut masih static sesuai request kamu, kalau mau dinamis juga bilang) --}}
                    <svg viewBox="0 0 200 200" class="h-52 w-52">
                        <circle cx="100" cy="100" r="70" fill="none" stroke="rgb(5,150,105)" stroke-width="22"
                                stroke-dasharray="198 440" transform="rotate(-90 100 100)"/>
                        <circle cx="100" cy="100" r="70" fill="none" stroke="rgb(37,99,235)" stroke-width="22"
                                stroke-dasharray="132 440" stroke-dashoffset="-198" transform="rotate(-90 100 100)"/>
                        <circle cx="100" cy="100" r="70" fill="none" stroke="rgb(244,63,94)" stroke-width="22"
                                stroke-dasharray="110 440" stroke-dashoffset="-330" transform="rotate(-90 100 100)"/>

                        <circle cx="100" cy="100" r="52" fill="white"/>
                        <text x="100" y="95" text-anchor="middle" font-size="14" fill="rgba(15,23,42,0.85)" font-weight="700">Pass Rate</text>
                        <text x="100" y="122" text-anchor="middle" font-size="24" fill="rgb(15,23,42)" font-weight="800">45%</text>
                    </svg>
                </div>

                <div class="mt-4 grid grid-cols-3 gap-2 text-xs">
                    <div class="rounded-xl border border-slate-200 bg-white p-2 text-center">
                        <div class="font-semibold text-emerald-700">45%</div>
                        <div class="text-slate-500">Passed</div>
                    </div>
                    <div class="rounded-xl border border-slate-200 bg-white p-2 text-center">
                        <div class="font-semibold text-blue-700">30%</div>
                        <div class="text-slate-500">Failed</div>
                    </div>
                    <div class="rounded-xl border border-slate-200 bg-white p-2 text-center">
                        <div class="font-semibold text-rose-700">25%</div>
                        <div class="text-slate-500">Progress</div>
                    </div>
                </div>
            </div>

            <!-- Activity -->
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-lg font-semibold">Activity Feed</div>
                        <div class="text-sm text-slate-500">Latest events (static)</div>
                    </div>
                    <button class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold hover:bg-slate-50 transition">
                        View
                    </button>
                </div>

                <div class="mt-4 space-y-3">
                    <div class="flex gap-3">
                        <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold">New quiz published</div>
                            <div class="text-xs text-slate-500">“Science Quiz” moved to published.</div>
                        </div>
                        <div class="text-xs text-slate-500">2m</div>
                    </div>

                    <div class="flex gap-3">
                        <div class="h-10 w-10 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-600"></span>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold">Leaderboard updated</div>
                            <div class="text-xs text-slate-500">Alice Brown reached score 980.</div>
                        </div>
                        <div class="text-xs text-slate-500">8m</div>
                    </div>

                    <div class="flex gap-3">
                        <div class="h-10 w-10 rounded-xl bg-rose-50 border border-rose-100 flex items-center justify-center">
                            <span class="h-2.5 w-2.5 rounded-full bg-rose-600"></span>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold">Failed attempts spike</div>
                            <div class="text-xs text-slate-500">Review “Math Quiz” question #3.</div>
                        </div>
                        <div class="text-xs text-slate-500">1h</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TABLES -->
    <section class="grid grid-cols-1 xl:grid-cols-3 gap-4">
        <!-- Top Quizzes -->
        <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="p-4 flex items-start justify-between gap-3">
                <div>
                    <div class="text-lg font-semibold">Top Quizzes</div>
                    <div class="text-sm text-slate-500">Most attempted quizzes (static)</div>
                </div>
                <div class="flex gap-2">
                    <button class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold hover:bg-slate-50 transition">Filters</button>
                    <button class="px-3 py-2 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:bg-black transition">Manage</button>
                </div>
            </div>

            <div class="border-t border-slate-200">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">Nama Quiz</th>
                            <th class="text-left px-4 py-3 font-semibold">Divisi</th>
                            <th class="text-right px-4 py-3 font-semibold">Questions</th>
                            <th class="text-right px-4 py-3 font-semibold">Attempts</th>
                            <th class="text-right px-4 py-3 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse ($topQuizzes as $quiz)

                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-semibold">{{ $quiz -> name }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $quiz -> divisi_name }}</td>
                            <td class="px-4 py-3 text-right font-semibold">{{ $quiz -> questions_count}}</td>
                            <td class="px-4 py-3 text-right font-semibold">{{ $quiz -> quiz_attempts_count }}</td>
                            <td class="px-4 py-3 text-right">
                                <button class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition">View</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                                No quiz found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <div class="text-lg font-semibold">System Status</div>
                    <div class="text-sm text-slate-500">Health checks (static)</div>
                </div>
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-100">All good</span>
            </div>

            <div class="mt-4 space-y-3 text-sm">
                <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-3">
                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-600"></span>
                        <div>
                            <div class="font-semibold">Database</div>
                            <div class="text-xs text-slate-500">Connected</div>
                        </div>
                    </div>
                    <div class="text-xs font-semibold text-slate-700">OK</div>
                </div>

                <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-3">
                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-600"></span>
                        <div>
                            <div class="font-semibold">Queue</div>
                            <div class="text-xs text-slate-500">Idle</div>
                        </div>
                    </div>
                    <div class="text-xs font-semibold text-slate-700">OK</div>
                </div>

                <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-3">
                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                        <div>
                            <div class="font-semibold">Storage</div>
                            <div class="text-xs text-slate-500">72% used</div>
                        </div>
                    </div>
                    <div class="text-xs font-semibold text-slate-700">WARN</div>
                </div>

                <div class="rounded-2xl bg-slate-900 text-white p-4 mt-2">
                    <div class="text-sm font-semibold">Tip</div>
                    <div class="text-xs text-white/80 mt-1">Review attempt yang sering gagal untuk perbaiki soal.</div>
                    <button class="mt-3 px-3 py-2 rounded-xl bg-white text-slate-900 text-xs font-semibold hover:bg-white/90 transition">
                        Open Attempts
                    </button>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- ✅ Chart.js CDN (kalau belum ada di layout utama) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const statusData = @json($quizAttemptGroupByStatusCount ?? []);

    const passed = Number(statusData.passed ?? 0);
    const failed = Number(statusData.failed ?? 0);
    const progress = Number(statusData.progress ?? 0);

    const total = passed + failed + progress;

    const passRate = total > 0 ? ((passed / total) * 100).toFixed(1) : 0;

    // Update angka di tengah
    document.addEventListener('DOMContentLoaded', function () {

        const ctx = document.getElementById('donutChart');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Passed', 'Failed', 'Progress'],
                datasets: [{
                    data: @json($quizAttemptGroupByStatusCount),
                    backgroundColor: [
                        '#059669',
                        '#2563eb',
                        '#f43f5e'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>
