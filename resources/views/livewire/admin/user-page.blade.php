<div>
    <livewire:components.sidebar-top />

    <div class="p-4 md:p-6 space-y-6 mt-4">
            <!-- HERO -->

            <!-- QUICK KPIs -->

            <section class=" flex flex-row items-center justify-between">
                <h1 class=" font-bold text-4xl">Table Users</h1>

                <a href="{{ route('dashboard.admin.user.create') }}" class=" bg-blue-500 px-4 py-2 rounded-md text-slate-50 font-bold">Tambah Data</a>
            </section>

            <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm font-semibold text-slate-700">Total Users</div>
                            <div class="text-xs text-slate-500">Account Active</div>
                        </div>
                        <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M20 21a8 8 0 10-16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this->usersPagination->total() }}</div>
                    {{-- <div class="text-sm font-semibold text-emerald-600">↑ 12%</div> --}}
                </div>
                {{-- <div class="mt-2 h-2 w-full rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full w-[62%] bg-blue-600 rounded-full"></div>
                </div> --}}
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Active Admin</div>
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
                    <div class="text-3xl font-semibold">{{ $this->usersData -> where('role', 'admin') -> count() }}</div>
                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Active Employee</div>
                        <div class="text-xs text-slate-500">Data Employee</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M6 7h12v14H6V7z" stroke="currentColor" stroke-width="2"/>
                            <path d="M7 3h10v4H7V3z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{ $this->usersData -> where('role', 'employee') -> count()}}</div>
                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-slate-700">Active Guest</div>
                        <div class="text-xs text-slate-500">Need action</div>
                    </div>
                    <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">
                        <svg class="h-5 w-5 text-blue-700" viewBox="0 0 24 24" fill="none">
                            <path d="M12 9v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 17h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10.29 3.86l-7.4 12.82A2 2 0 004.61 20h14.78a2 2 0 001.72-3.32l-7.4-12.82a2 2 0 00-3.42 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-3 flex items-end justify-between">
                    <div class="text-3xl font-semibold">{{  $this->usersData -> where('role', 'umum') -> count() }}</div>
                </div>
            </div>
        </section>

        <!-- TABLES -->
        <section class="grid gap-4">
            <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-4 flex items-start justify-between gap-3">
                    <div>
                        <div class="text-lg font-semibold">Data Users</div>
                        <div class="text-sm text-slate-500">Manage data users</div>
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
                    <thead class="bg-slate-900 text-slate-50">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">No</th>
                            <th class="text-left px-4 py-3 font-semibold">Nama</th>
                            <th class="text-left px-4 py-3 font-semibold">Email</th>
                            <th class="text-left px-4 py-3 font-semibold">Number Phone</th>
                            <th class="text-left px-4 py-3 font-semibold">Role</th>
                            <th class="text-right px-4 py-3 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @forelse($this->usersPagination as $user)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-semibold">{{ $loop -> iteration}}</td>
                            <td class="px-4 py-3 font-semibold">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $user->number_phone }}</td>
                            <td class="px-4 py-3">
                                @if($user->role === 'admin')
                                    <span class="inline-flex px-2 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 text-xs font-semibold">{{ $user->role }}</span>
                                @else
                                    <span class="inline-flex px-2 py-1 rounded-lg bg-slate-50 text-slate-700 border border-slate-200 text-xs font-semibold">{{ $user->role }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right flex flex-row gap-2">
                                <form id="form-user-{{ $user -> id }}" action="{{ route('user.destroy', ['id' => $user -> id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>

                                       <a href="{{ route('dashboard.admin.user.edit', ['id' => $user -> id] ) }}"

                                        class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
                                        >
                                            <x-icon.pen :width="18" height="18" />
                                        </a>

                                    <button
                                    id="delete-btn-{{ $user -> id }}"
                                    type="button"
                                    {{-- onclick="confirm('tes {{ $user->id }}')" --}}
                                    onclick="handleOnDelete('form-user-{{ $user -> id }}')"
                                    {{-- onclick="deleteConfirmation({{ $user -> id }})" --}}
                                    {{-- onclick="handleOnDelete(event, {{ $user -> id }})" --}}
                                    >

                                        <x-icon.trash :width="18" height="18" />
                                    </button>

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
                        <span class="font-semibold text-slate-900">{{ $this->usersPagination->firstItem() ?? 0 }}</span>
                        to
                        <span class="font-semibold text-slate-900">{{ $this->usersPagination->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-semibold text-slate-900">{{ $this->usersPagination->lastPage() ?? 0 }}</span>
                        results
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        <!-- Prev -->
                        @if ($this->usersPagination->onFirstPage())
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
                                $current = $this->usersPagination->currentPage();
                                $last = $this->usersPagination->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                                @endphp

    {{-- @for ($i = $current; $current < $current + 2; $i++) --}}
                            <div>
                                <h1>{{ $current }}</h1>
                            </div>
    {{-- @endfor --}}


                            <!-- Next -->
                            @if ($this->usersPagination->hasMorePages())
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




