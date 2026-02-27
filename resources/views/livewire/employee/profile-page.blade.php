<div class=" space-y-4">
    <h1 class=" font-bold text-2xl">Halo, {{ Auth::user() -> name }}</h1>

     <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Quiz Attempted</div>
                        <div class="text-xs text-slate-500">Quiz yang sudah dikerjakan</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this -> quizAttemptData -> attempts }}</div>
                </div>

                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">In This Month</span>
                </div>
            </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Your Score</div>
                        <div class="text-xs text-slate-500">Total score kamu</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{$this -> quizAttemptData -> total_score}} Score</div>
                </div>

                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">In This Month</span>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Best Score</div>
                        <div class="text-xs text-slate-500">Total quiz what you've finished</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{$this -> quizAttemptData -> best_score}}%</div>
                </div>
                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">Best Score</span>
                </div>
            </div>
        </section>

        <livewire:employee.components.charts.history-quiz-attempt-chart />
        
        <livewire:employee.components.charts.history-quiz-score-chart />

</div>
