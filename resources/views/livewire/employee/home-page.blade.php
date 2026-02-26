<div>
    <div class="p-4 md:p-6 space-y-6">
        <!-- HERO -->
        <section class="bg-gradient-to-r from-blue-600 to-slate-900 rounded-3xl p-5 md:p-6 text-white overflow-hidden relative">
            <div class="  h-40 w-40 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-10 -left-10 h-52 w-52 rounded-full bg-white/10"></div>

            <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="mt-1 text-2xl md:text-3xl font-semibold tracking-tight">Welcome to Sinwaz LMS</h1>
                    <p class="mt-2 text-sm text-white/80 max-w-2xl">
                        Ringkasan performa quiz, users, attempts, dan leaderboard. Semua angka di bawah ini masih dummy (statis).
                    </p>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Available Quiz</div>
                        <div class="text-xs text-slate-500">Published Quizs</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ 1 }}</div>
                </div>
                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
                </div>
            </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Active Quiz</div>
                        <div class="text-xs text-slate-500">Published Divisi Quiz</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{1}}</div>
                </div>
                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Quiz Attempted</div>
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
                    <div class="text-3xl font-semibold">{{2}}</div>
                </div>
                <div class="mt-2 flex gap-2">
                    <span class="text-xs font-semibold px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100">published</span>
                </div>
            </div>
        </section>

        <section class="flex flex-col">
            <div class=" mb-3">
                <h1 class=" text-2xl font-bold">Quiz</h1>
            </div>

            <div class=" grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($this -> quizzesData as $quiz)
                    <livewire:employee.components.cards.quiz-card quizId="{{$quiz -> id }}" quizName="{{$quiz -> name }}" divisiName="{{$quiz -> divisi -> name }}" quizDuration="{{ $quiz -> duration }}" />

                    @empty
                    <div>
                        empty
                    </div>
                @endforelse
            </div>
        </section>

        <section class="flex flex-col">
            <div class=" mb-3">
                <h1 class=" text-2xl font-bold">Courses</h1>
            </div>

            <div class=" grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse ($this -> coursesData as $course)
                    <livewire:employee.components.cards.course-card :id="$course -> id" />
                @empty
                    <div>
                        empty
                    </div>
                @endforelse
            </div>
        </section>

    </div>

    @if ($this -> isOpenStartQuizSheet)

    <section class="fixed h-screen w-screen  top-0 left-0 z-50 flex justify-center items-center bg-black/70">

    </section>
    @endif
</div>



