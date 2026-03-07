<?php

namespace App\Livewire\Admin\Components\Charts;

use App\Services\QuizAttemptService;
use Carbon\Carbon;
use Livewire\Component;

class QuizAttemptGroupByStatusInThisMonthCircleChart extends Component
{
     public $quizAttemptGroupByStatusInTHisMonth;
    public $totalQuizAttemptGroupByPerMonth = [];
    public $status = [];

    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);

        $this->quizAttemptGroupByStatusInTHisMonth = $quizAttemptService -> getQuizAttemptGroupByStatusInThisMonth();

        for ($i = 0; $i < $this->quizAttemptGroupByStatusInTHisMonth -> count(); $i++) {
            $this->totalQuizAttemptGroupByPerMonth[$i] = $this -> quizAttemptGroupByStatusInTHisMonth[$i]->total;
        }

        for ($i = 0; $i < $this->quizAttemptGroupByStatusInTHisMonth -> count(); $i++) {
            $this->status[$i] = $this -> quizAttemptGroupByStatusInTHisMonth[ $i ]->status;
        }
    }

    public function render()
    {
        return view('livewire.admin.components.charts.quiz-attempt-group-by-status-in-this-month-circle-chart');
    }
}
