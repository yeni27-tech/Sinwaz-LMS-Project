<?php

namespace App\Livewire\Employee\Components\Cards;

use Livewire\Component;

class QuizCard extends Component
{
    public $quizId;
    public $quizName;
    public $divisiName;
    public $quizDuration;
    public function mount($quizId,$quizName,$divisiName,$quizDuration ) {
        $this->quizId = $quizId;
        $this->quizName = $quizName;
        $this->divisiName = $divisiName;
        $this->quizDuration = $quizDuration;
    }
    public function render()
    {
        return view('livewire.employee.components.cards.quiz-card');
    }
}
