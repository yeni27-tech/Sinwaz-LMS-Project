<div>
    <livewire:components.sidebar-top />

    <div class="p-4 md:p-6 space-y-6 mt-4">            <!-- HERO -->

            <!-- QUICK KPIs -->

            <section class=" flex flex-row items-center justify-between">
                <h1 class=" font-bold text-4xl">Table Divisis</h1>

                <a href="{{ route('dashboard.admin.divisi.create') }}" class=" bg-blue-500 px-4 py-2 rounded-md text-slate-50 font-bold">Tambah Data</a>
            </section>

        <!-- TABLES -->
        <section class="grid gap-4">
            <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="p-4 flex items-start justify-between gap-3">
                    <div>
                        <div class="text-lg font-semibold">Data Divisi</div>
                        <div class="text-sm text-slate-500">Manage data Divisi</div>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Search (Livewire reactive) -->
                        <div class="relative">
                            <input
                            type="text"
                            placeholder="Search divisi..."
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
                            <th class="text-right px-4 py-3 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @forelse($this -> divisiPagination as $divisi)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3 font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $divisi->name }}</td>
                            <td class="px-4 py-3 text-right flex flex-row gap-2">
                                 <form id="form-divisi-{{ $divisi -> id }}" action="{{ route('divisi.destroy', ['id' => $divisi -> id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                                    <a href="{{ route('dashboard.admin.divisi.edit', ['id' => $divisi -> id]) }}"
                                    class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
                                    >
                                        <x-icon.pen :width="18" height="18" />
                                    </a>

                                    <button
                                    id="delete-btn-{{ $divisi -> id }}"
                                    type="button"
                                    class="px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-semibold hover:bg-slate-50 transition"
                                    {{-- onclick="confirm('tes {{ $divisi->id }}')" --}}
                                    onclick="handleOnDelete('form-divisi-{{ $divisi -> id }}')"
                                    {{-- onclick="deleteConfirmation({{ $divisi -> id }})" --}}
                                    {{-- onclick="handleOnDelete(event, {{ $divisi -> id }})" --}}
                                    >

                                        <x-icon.trash :width="18" height="18" />
                                    </button>

                            </td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                                No divisis found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination (Livewire) -->
                <div class="border-t border-slate-200 p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-slate-600">
                        Showing
                        <span class="font-semibold text-slate-900">{{ $this-> divisiPagination->firstItem() ?? 0 }}</span>
                        to
                        <span class="font-semibold text-slate-900">{{ $this-> divisiPagination->lastItem() ?? 0 }}</span>
                        of
                        <span class="font-semibold text-slate-900">{{ $this-> divisiPagination->lastPage() ?? 0 }}</span>
                        results
                    </div>

                    <div class="flex items-center justify-end gap-2">
                        <!-- Prev -->
                        @if ($this-> divisiPagination->onFirstPage())
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
                            $current = $this-> divisiPagination->currentPage();
                            $last = $this-> divisiPagination->lastPage();
                            $start = max(1, $current - 2);
                            $end = min($last, $current + 2);
                        @endphp

                        <div>
                            <h1>{{ $current }}</h1>
                        </div>

                            <!-- Next -->
                        @if ($this-> divisiPagination->hasMorePages())
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
</div>
