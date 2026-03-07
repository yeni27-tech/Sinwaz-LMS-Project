<div>

    <livewire:components.sidebar-top />

    <div class="p-4 md:p-6 space-y-6 mt-4">
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
                        <div class="text-xs text-slate-500">Active Users</div>
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
            </div>
             <div class="mt-2 flex gap-2">
                <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
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
                    <div class="text-xs text-slate-500">Published materials</div>
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
                    <div class="text-xs text-slate-500">Published jobs</div>
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
            </div>
            <div class="mt-2 text-xs text-slate-500">All time</div>
        </div>

        <livewire:admin.components.charts.quiz-attempt-group-by-status-in-this-month-circle-chart />
    </section>

    <div class=" grid grid-cols-1">
        <livewire:admin.components.charts.history-total-quiz-attempt-chart />
        <livewire:admin.components.charts.top-quiz-chart />

        {{-- <livewire:admin.components.charts.history-total-quiz-attempt-chart /> --}}
    </div>

</div>
</div>

{{-- ✅ Chart.js CDN (kalau belum ada di layout utama) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
