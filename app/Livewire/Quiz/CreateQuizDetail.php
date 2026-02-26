<?php

namespace App\Livewire\Quiz;

use App\DTO\AnswerRequestDTO;
use App\DTO\QuestionRequestDTO;
use App\DTO\QuizRequestDTO;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\QuestionRequest;
use App\Services\AnswerService;
use App\Services\DivisiService;
use App\Services\QuestionService;
use App\Services\QuizService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CreateQuizDetail extends Component
{
    use WithPagination;

    public $answerText = "";
    public $quizId;
    public $answers;
    public $questions;
    public $quizById;
    public $quizService;
    public $name;
    public $description;
    public $divisi_id;

    public function mount($id)
    {
        $quizService = app(QuizService::class);
        $this->quizId = $id;
        $this -> quizById = $quizService -> getQuizById($this -> quizId);
        $this -> name = $this -> quizById -> name;
        $this -> description = $this -> quizById -> description;

        foreach ($this->quizById -> question as $question) {
            $this->questions[$question->id] = $question->text;

            foreach ($question->answer as $answer) {
                $this->answers[$answer->id] = $answer->text;
            }
        }
    }

    public function placeholder() {
        return view('components.loading');
    }

    public function render()
    {
        $quizById = $this -> quizById;

        return view('livewire.quiz.create-quiz-detail', compact('quizById'));
    }


    public function createQuestion($quizId) {
        $questionService = app(QuestionService::class);
        $dto = new QuestionRequestDTO([
            'quiz_id' => $quizId,
            'text' => '',
            'order_number' => 1
        ]);

        return $questionService -> postQuestion($dto);
    }

    public function createAnswer($question_id) {
        $answerService = app(AnswerService::class);


        $answerService -> postAnswer($question_id);


        return redirect()->back();
    }

    public function pickCorrectAnswer($answerId, $questionId) {
        $answerService = app(AnswerService::class);

        $answerService -> pickCorrectAnswer($answerId, $questionId);
    }

    public function inputAnswerText($answerId) {
        $answerService = app(AnswerService::class);
        $this->validate([
            "answers.$answerId" => 'required|string|max:255',
        ]);

        $answerService -> putAnswerText($answerId, $this -> answers[ $answerId ]);
    }

    public function putQuiz($id) {
        $quizService = app(QuizService::class);
        $quizRequestDto = new QuizRequestDTO([
            'name' => $this -> name,
            'divisi_id' => $this -> divisi_id,
            'description' => $this -> description,
        ]);

        return $quizService -> putQuiz($id, $quizRequestDto);
    }

    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
    }

    public function inputQuestionText($questionId) {
        $questionService = app(QuestionService::class);

        $this->validate([
            "questions.$questionId" => 'required|string|max:255',
        ]);
        $questionService -> patchQuestionText($questionId, $this -> questions[ $questionId ]);
    }

    public function deleteAnswer($answerId) {
        $answerService = app(AnswerService::class);

        $answerService -> deleteAnswer($answerId);

        return redirect()->back();
    }

    public function activatedQuiz($quizId) {
        $quizService = app(QuizService::class);
    }

    public function deleteQuestionById($questionId) {
        $questionService = app(QuestionService::class);

        $questionService -> deleteQuestionById($questionId);

        return redirect()->back();

    }
}


