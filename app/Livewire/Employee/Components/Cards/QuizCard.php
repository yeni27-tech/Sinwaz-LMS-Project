<?php

namespace App\Livewire\Employee\Components\Cards;

use App\Services\QuizService;
use Livewire\Component;

class QuizCard extends Component
{
    public $quizId;
    public $quizById;
    public $latestCard;
    public function mount($quizId ) {
        $quizService = app(QuizService::class);

        $this->quizId = $quizId;
        $this ->quizById = $quizService -> getQuizById( $this->quizId );
    }
    public function render()
    {
        return view('livewire.employee.components.cards.quiz-card');
    }
}
