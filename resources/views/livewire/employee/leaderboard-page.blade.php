<div class="">
    <livewire:components.sidebar-top />

    <div class="space-y-6 mt-4">
        <h1 class=" font-bold text-2xl">Leaderboard 🏆</h1>

        <section class=" grid lg:grid-cols-3 grid-cols-1 gap-4 h-full">
            @if ($top10LeaderboardsData -> count() > 2)
             <div class="mt-8">
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[1] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="2"  />
            </div>

            <div>
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[0] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="1" />
            </div>

            <div class="mt-8">
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[2] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="3" />
            </div>
           @endif
        </section>

        <section>
            <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold">Peringkat</th>
                            <th class="text-left px-4 py-3 font-semibold">Name</th>
                            <th class="text-left px-4 py-3 font-semibold">Score</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @forelse($this->top10LeaderboardsData as $user)
                        <tr class="hover:bg-slate-50 {{ $user -> name == Auth::user() -> name ? 'bg-slate-100' : 'bg-white' }} ">
                            <td class="px-4 py-3 font-semibold">
                                @if ($loop->iteration == 1)
                                    <x-icon.gold-medal />
                                @elseif ($loop->iteration == 2)
                                    <x-icon.silver-medal />
                                @elseif ($loop->iteration == 3)
                                    <x-icon.bronze-medal />
                                @else
                                    {{ $loop->iteration }}
                                @endif
                            </td>

                            <td class="px-4 py-3 font-semibold">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $user->total_score }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                                3 or more have to submit quiz first.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
        </section>
    </div>
</div>



