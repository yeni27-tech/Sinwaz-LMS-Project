<?php

namespace App\Livewire\Employee\Components\Charts;

use App\Services\QuizAttemptService;
use Carbon\Carbon;
use Livewire\Component;

class HistoryQuizScoreChart extends Component
{
    public $historyQuizAttemptsGroupByMonth;
    public $totalScorePerMonth = [];
    public $months = [];

    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);

        $this->historyQuizAttemptsGroupByMonth = $quizAttemptService -> getUserHistoryTotalQuizScoreGroupByMonth();

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->totalScorePerMonth[$i] = $this -> historyQuizAttemptsGroupByMonth[$i]->total;
        }

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->months[$i] = Carbon::create() ->month( $this -> historyQuizAttemptsGroupByMonth[$i]->month) -> format('F');
        }
    }

    public function render()
    {
        return view('livewire.employee.components.charts.history-quiz-score-chart');
    }
}
