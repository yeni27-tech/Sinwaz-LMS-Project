<?php

namespace App\Livewire\Admin\Components\Charts;

use App\Services\QuizAttemptService;
use Carbon\Carbon;
use Livewire\Component;

class HistoryTotalQuizAttemptChart extends Component
{
     public $historyQuizAttemptsGroupByMonth;
    public $totalAttemptPerMonth = [];
    public $months = [];

    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);

        $this->historyQuizAttemptsGroupByMonth = $quizAttemptService -> getHistoryTotalQuizAttemptGroupByMonth();

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->totalAttemptPerMonth[$i] = $this -> historyQuizAttemptsGroupByMonth[$i]->total;
        }

        for ($i = 0; $i < $this->historyQuizAttemptsGroupByMonth -> count(); $i++) {
            $this->months[$i] = Carbon::create() ->month( $this -> historyQuizAttemptsGroupByMonth[$i]->month) -> format('F');
        }
    }

    public function render()
    {
        return view('livewire.admin.components.charts.history-total-quiz-attempt-chart');
    }
}
