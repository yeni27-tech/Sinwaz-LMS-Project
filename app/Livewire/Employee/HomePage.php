<?php

namespace App\Livewire\Employee;

use App\DTO\QuizAttemptRequestDTO;
use App\Services\CourseService;
use App\Services\QuizAttemptService;
use App\Services\QuizService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;
use Symfony\Component\HttpFoundation\Request;

class HomePage extends Component
{
    use WithPagination,WithSweetAlert;

    public $isOpenStartQuizSheet = false;
    public $quizId;
    public $quizName;
    public $divisiName;
    public $quizDuration;
    public $quizzesData;
    public $coursesData;
    public $quizAttemptData;
    public $totalMaterialsData;

    public function mount() {
        $quizService = app(QuizService::class);
        $courseService = app(CourseService::class);
        $quizAttemptService = app(QuizAttemptService::class);

        $quizzesData = $quizService -> getAllQuizzes() -> where('divisi_id', 4);
        $coursesData = $courseService -> getCoursesWithoutPagination() -> where('divisi_id', 4);

        $this->quizzesData = $quizzesData;
        $this->coursesData = $coursesData;
        $this->quizAttemptData = $quizAttemptService ->getQuizAttemptByUserId(Auth::user()->id);


        foreach ($this->coursesData as $course) {
            $this->totalMaterialsData += $course->material->count();
        }
    }

    public function placeholder() {
        return view('components.loading');
    }


    public function render()
    {
        return view('livewire.employee.home-page');
    }
}
