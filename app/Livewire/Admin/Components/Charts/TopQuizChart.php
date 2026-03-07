<?php

namespace App\Livewire\Admin\Components\Charts;

use App\Services\QuizService;
use Livewire\Component;

class TopQuizChart extends Component
{
    public $quizNames = [];
    public $topQuizzes;
    public $quizAttemptsCount = [];
    public function mount() {
        $quizService = app(QuizService::class);
        $this->topQuizzes = $quizService->getTopQuizzesInThisMonth(10);


        for ($i=0; $i < $this -> topQuizzes -> count(); $i++) {
            $this -> quizNames[$i] = $this->topQuizzes[$i] -> name;
            $this -> quizAttemptsCount[$i] = $this->topQuizzes[$i] -> quiz_attempts_count;
        }
    }

    public function render()
    {
        return view('livewire.admin.components.charts.top-quiz-chart');
    }
}
