<div>
    <div class="p-4 md:p-6 space-y-6">
        <h1 class=" font-bold text-2xl">Leaderboard 🏆</h1>

        <section class=" grid grid-cols-3 gap-4 h-full">
            <div class="mt-8">
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[1] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="2"  />
            </div>

            <div>
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[0] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="1" />
            </div>

            <div class="mt-8">
                <livewire:employee.components.cards.leaderboard-card :name="$this->top10LeaderboardsData[2] -> name" :total_score="$this->top10LeaderboardsData[0] -> total_score" :rank="3" />
            </div>
        </section>
    </div>
</div>



