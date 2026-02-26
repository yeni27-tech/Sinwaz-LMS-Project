<?php

namespace App\Livewire\Employee;

use App\Services\QuizAttemptService;
use Livewire\Component;
use Livewire\WithPagination;

class LeaderboardPage extends Component
{
    use WithPagination;
    public $top10LeaderboardsData;
    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);

        $this->top10LeaderboardsData = $quizAttemptService->getLeaderboardsPerMonth();
        // dd($this->top10LeaderboardsData[0]);

    }

    public function placeholder() {
        return view('components.loading');
    }
    public function render()
    {

        return view('livewire.employee.leaderboard-page');
    }
}
