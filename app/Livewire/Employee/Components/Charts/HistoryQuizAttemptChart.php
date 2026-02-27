<?php

namespace App\Livewire\Employee\Components\Charts;

use App\Models\QuizAttempt;
use App\Services\QuizAttemptService;
use Carbon\Carbon;
use Livewire\Component;

class HistoryQuizAttemptChart extends Component
{
    public $historyQuizAttemptsGroupByMonth;
    public $totalAttemptPerMonth = [];
    public $months = [];

    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);

        $this->historyQuizAttemptsGroupByMonth = $quizAttemptService -> getUserHistoryQuizAttemptGroupByMonth();

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->totalAttemptPerMonth[$i] = $this -> historyQuizAttemptsGroupByMonth[$i]->total;
        }

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->months[$i] = Carbon::create() ->month( $this -> historyQuizAttemptsGroupByMonth[$i]->month) -> format('F');
        }
    }

    public function render()
    {
        return view('livewire.employee.components.charts.history-quiz-attempt-chart');
    }
}
