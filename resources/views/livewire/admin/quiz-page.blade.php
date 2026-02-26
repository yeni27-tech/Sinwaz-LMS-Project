<div>
    <div class="p-4 md:p-6 space-y-6">
            <!-- HERO -->

            <!-- QUICK KPIs -->

            <section class=" flex flex-row items-center justify-between">
                <h1 class=" font-bold text-4xl">Table Quizzes</h1>

                <a href="{{ route("dashboard.admin.quiz.create") }}" class=" bg-blue-500 px-4 py-2 rounded-md text-slate-50 font-bold">Tambah Data</a>
            </section>

            <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold text-slate-700">Total Quizzes</div>
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
                    <div class="text-3xl font-semibold">{{ $this-> quizzes()->count() }}</div>
                </div>
                <div class="mt-2 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full w-[62%] bg-blue-600 rounded-full"></div>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Active Quiz</div>
                        {{-- <div class="text-xs text-slate-500">Published </div> --}}
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this-> quizzes() -> where('is_active', true)->count() }}</div>
                    <div class="text-xs text-slate-500">Data Quiz</div>
                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Non Active Quiz</div>
                        <div class="text-xs text-slate-500">Data Quiz</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this-> quizzes() -> where('is_active', false)->count() }}</div>
                </div>

            </div>

            {{-- <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Quiz Attempt</div>
                        <div class="text-xs text-slate-500">Total</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M12 9v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 17h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10.29 3.86l-7.4 12.82A2 2 0 004.61 20h14.78a2 2 0 001.72-3.32l-7.4-12.82a2 2 0 00-3.42 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div> --}}

                {{-- <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this-> quizzes ->count() }}</div>

                </div> --}}
            </div>
        </section>

        <!-- TABLES -->
        <section class="grid gap-4">
            <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-4 flex items-start justify-between gap-3">
                    <div>
                        <div class="text-lg font-semibold">Data Quizzes</div>
                        <div class="text-sm text-slate-500">Manage data Quizzes</div>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Search (Livewire reactive) -->
                        <div class="relative">
                            <input
                            type="text"
                            placeholder="Search user..."
                            wire:model.live.debounce.300ms="search"
                            class="w-56 px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            />
                            <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                                    <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M21 21l-4.3-4.3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                        <button
                        type="button"
                        class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold hover:bg-slate-50 transition"
                        wire:click="$set('search','')"
                        >
                        Reset
                    </button>
                </div>
            </div>

            <div class="border-t border-slate-200">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">Name</th>
                            <th class="text-left px-4 py-3 font-semibold">Divisi</th>
                            <th class="text-left px-4 py-3 font-semibold">Total Attemp</th>
                            <th class="text-left px-4 py-3 font-semibold">Status</th>
                            <th class="text-right px-4 py-3 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @forelse($this -> quizzesPagination as $quiz)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-semibold">{{ $quiz->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $quiz -> divisi_id != null ? $quiz -> divisi -> name  : 'None'}}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $quiz->quizAttempt -> count() }}</td>
                            <td class="px-4 py-3">
                                @if($quiz->is_active)
                                    <span class="inline-flex px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 text-xs font-semibold">Active</span>
                                @else
                                    <span class="inline-flex px-2 py-1 rounded-lg bg-slate-50 text-slate-700 border border-slate-200 text-xs font-semibold">Non Active</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right flex flex-row gap-2">
                                    <button
                                    id="delete-btn-{{ $quiz -> id }}"
                                    wire:click="deleteQuiz({{ $quiz -> id }})"
                                    {{-- onclick="handleOnDelete(event, {{ $quiz -> id }})" --}}
                                    >

                                        <x-icon.trash :width="18" height="18" />
                                    </button>
                                <a href="{{ route('dashboard.admin.quiz.detail', ['id' => $quiz -> id]) }}"
                                class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
                                >
                                    <x-icon.pen :width="18" height="18" />
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                                No users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination (Livewire) -->
                <div class="border-t border-slate-200 p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-slate-600">
                        Showing
                        <span class="font-semibold text-slate-900">{{ $this-> quizzesPagination->firstItem() ?? 0 }}</span>
                        to
                        <span class="font-semibold text-slate-900">{{ $this-> quizzesPagination->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-semibold text-slate-900">{{ $this-> quizzesPagination->lastPage() ?? 0 }}</span>
                        results
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        <!-- Prev -->
                        @if ($this-> quizzesPagination->onFirstPage())
                        <span class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-400 cursor-not-allowed">Prev</span>
                        @else
                        <button
                        type="button"
                        wire:click="previousPage"
                        class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold hover:bg-slate-50 transition"
                        >
                        Prev
                    </button>
                    @endif

                    @php
                                $current = $this-> quizzesPagination->currentPage();
                                $last = $this-> quizzesPagination->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                                @endphp

    {{-- @for ($i = $current; $current < $current + 2; $i++) --}}
                            <div>
                                <h1>{{ $current }}</h1>
                            </div>
    {{-- @endfor --}}


                            <!-- Next -->
                            @if ($this-> quizzesPagination->hasMorePages())
                                <button
                                type="button"
                                wire:click="nextPage"
                                class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold hover:bg-slate-50 transition"
                                >
                                Next
                            </button>
                            @else
                            <span class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-400 cursor-not-allowed">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
{{--
       @if ($this -> showCreateQuizForm)
         <div wire:click='closeCreateQuizForm'>
            <livewire:admin.components.create-quiz-form showCreateQuizForm="{{ $this -> showCreateQuizForm }}" />
        </div>

    @elseif ($this -> showUpdateQuizForm)
        <div >
            <livewire:admin.components.update-quiz-form id="{{ $this -> id }}"  name="{{ $this -> name }}" email="{{ $this -> email }}" number_phone="{{ $this -> number_phone}}" divisi_id="{{ $this -> divisi_id }}" role="{{ $this -> role }}" password="{{ $this -> password }}"  />
        </div>
    @endif --}}
</div>
