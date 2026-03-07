<?php

namespace App\Livewire\Quiz;

use App\Services\QuizAttemptService;
use Livewire\Component;

class QuizAttemptResultPage extends Component
{
    public $id;
    public $quizAttemptById;
    public $correctAnswers = 0;
    public $failedAnswers;
    public function mount($id) {
        $quizAttemptService = app(QuizAttemptService::class);
        $this->id = $id;
        $this -> quizAttemptById = $quizAttemptService -> getQuizAttemptById($this -> id);


        if($this -> quizAttemptById -> status == "in_progress") {
            return redirect()->route('quiz.attempt', ['id' => $this ->id]);
        }

        foreach($this -> quizAttemptById -> quizAttemptAnswer as $answer) {
            if($answer -> answer -> is_correct) $this -> correctAnswers += 1;
        }
    }
    public function render()
    {
        return view('livewire.quiz.quiz-attempt-result-page');
    }
}
