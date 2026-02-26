<?php

namespace App\Livewire\Employee\Components\Forms;

use App\DTO\QuizAttemptRequestDTO;
use App\Services\QuizAttemptService;
use App\Services\QuizService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class QuizStartConfirmation extends Component
{
    use WithPagination,WithSweetAlert;

    public $id;
    public $quizById;
    public $quizzesData;
    public $latestQuizAttempt;
    public function mount($id) {
        $quizService = app(QuizService::class);
        $quizAttemptService = app(QuizAttemptService::class);

        $this -> id = $id;
        $this -> quizById = $quizService -> getQuizById($this ->id);
        $this -> latestQuizAttempt = $quizAttemptService->getLatestQuizAttemptByUserId(Auth::user()->id, $this -> quizById -> id)->first();

    }

       public function startQuiz() {
        $quizAttemptService = app(QuizAttemptService::class);
        $quizAttemptRequestDTO = new QuizAttemptRequestDTO([
            'quiz_id' => $this -> quizById ->id,
            'user_id' => Auth::user() -> id,
            'score' => 0,
            'status' => 'in_progress',
            'submitted_at' => null
        ]);

        $newQuizAttempt = $quizAttemptService -> postQuizAttempt($quizAttemptRequestDTO);

        return redirect()->route('quiz.attempt', ['id' => $newQuizAttempt -> id]);
    }

    public function continouQuiz() {
        return redirect() -> route('quiz.attempt', ['id' => $this -> latestQuizAttempt -> id]);
    }

    public function placeholder() {
        return view('components.loading');
    }
    public function render()
    {
        return view('livewire.employee.components.forms.quiz-start-confirmation');
    }
}
