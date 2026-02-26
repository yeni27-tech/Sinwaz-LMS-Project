<?php

namespace App\Livewire\Quiz;

use App\DTO\QuestionRequestDTO;
use App\DTO\QuizAttemptAnswerRequestDTO;
use App\DTO\QuizAttemptRequestDTO;
use App\Services\QuestionService;
use App\Services\QuizAttemptAnswerService;
use App\Services\QuizAttemptService;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizAttemptPage extends Component
{

    public $answerText = "";
    public $quizAttemptId;
    public $answers;
    public $questions;
    public $quizAttemptById;
    public $quizAttemptService;
    public $score;

    public function mount($id)
    {
        $quizAttemptService = app(QuizAttemptService::class);
        $quizAttemptAnswerService = app(QuizAttemptAnswerService::class);
        $this->quizAttemptId = $id;
        $this -> quizAttemptById = $quizAttemptService -> getQuizAttemptById($this -> quizAttemptId);
        $quizAttemptAnswers = $quizAttemptAnswerService -> getQuizAttemptAnswersByQuizAttemptId($id);

        foreach ($this->quizAttemptById -> quiz -> question as $question) {
            $this->questions[$question->id] = $question->text;

            foreach ($question->answer as $answer) {
                $this->answers[$answer->id] = $answer->text;
            }
        }

        foreach ($quizAttemptAnswers as $quizAttemptAnswer) {
            if($quizAttemptAnswer ->  answer -> is_correct === true) {
                $this -> score += 1;
            }
        }
    }
    public function placeholder() {
        return view('components.loading');
    }

    public function render()
    {
        $quizAttemptAnswerService = app(QuizAttemptAnswerService::class);
        $quizAttemptById = $this -> quizAttemptById;
        $quizAttemptAnswers = $quizAttemptAnswerService -> getQuizAttemptAnswersByQuizAttemptId($quizAttemptById -> id);
        $score = $this -> score;

        return view('livewire.quiz.quiz-attempt-page', compact('quizAttemptById','quizAttemptAnswers', 'score'));
    }


    public function pickAnswer($answerId,$questionId) {
        $quizAttemptAnswerService = app(QuizAttemptAnswerService::class);

        $quizAttemptAnswerRequestDTO = new QuizAttemptAnswerRequestDTO([
            'quiz_attempt_id' => $this -> quizAttemptId,
            'answer_id' => $answerId,
            'question_id' => $questionId,
            'answer_text' => ''
        ]);

        $quizAttemptAnswerService -> postQuizAttemptAnswerByPick($quizAttemptAnswerRequestDTO);
    }

    public function submitQuiz() {
        $score = $this -> score;
        $quizAttemptService = app(QuizAttemptService::class);
        $quizAttemptById = $this -> quizAttemptById;
        $quizAttemptRequestDTO = new QuizAttemptRequestDTO([
            'quiz_id' =>  $quizAttemptById -> quiz -> id,
            'user_id' => Auth::user() -> id,
            'score' => floor($score / $quizAttemptById -> quiz -> question  -> count() * 100),
            'status' => 'done',
            'submitted_at' => new DateTime(),
        ]);

        $quizAttemptService -> submitQuiz( $quizAttemptById -> id, $quizAttemptRequestDTO -> score);
    }
}
