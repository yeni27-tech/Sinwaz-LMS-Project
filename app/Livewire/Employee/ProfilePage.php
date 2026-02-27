<?php

namespace App\Livewire\Employee;

use App\Services\QuizAttemptService;
use Livewire\Component;

class ProfilePage extends Component
{
    public $quizAttemptData;
    public $historyQuizAttemptsGroupByMonth;
    public function mount() {
        $quizAttemptService = app(QuizAttemptService::class);
        // $quizAttempt = app(QuizAttemptService::class);

        $this->historyQuizAttemptsGroupByMonth = $quizAttemptService -> getUserHistoryQuizAttemptGroupByMonth();

        $this->quizAttemptData = $quizAttemptService -> getUserHistoryQuizAttempt();
    }

    public function placeholder() {
        return view('components.loading');
    }

    public function render()
    {
        return view('livewire.employee.profile-page');
    }
}
