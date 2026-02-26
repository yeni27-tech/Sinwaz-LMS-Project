<?php

namespace App\Livewire\Admin;

use App\Services\CourseService;
use App\Services\DivisiService;
use App\Services\JobService;
use App\Services\MaterialService;
use App\Services\QuizAttemptService;
use App\Services\QuizService;
use App\Services\UserService;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public $activeQuizzes;
    public $allUsers;
    public $allJobs;
    public $allMaterials;
    public $allCourses;
    public $allDivisis;
    public $topQuizzes;
    public $allQuizAttempts;
    public $quizAttempts;
    public $quizAttemptGroupByStatusCount;
    public $quizService;
    public function mount() {
        $quizService = app(QuizService::class);
        $jobService = app(JobService::class);
        $materialService = app(MaterialService::class);
        $courseService = app(CourseService::class);
        $quizAttemptService = app(QuizAttemptService::class);
        $userService = app(UserService::class);
        $divisiService = app(DivisiService::class);

        $this -> quizAttemptGroupByStatusCount = $quizAttemptService -> getQuizAttemptsGroupByStatusInThisMonth();
        $this->activeQuizzes = $quizService->getActiveQuizzes();
        $this->allUsers = $userService->getUsersWithoutPagination();
        $this->allCourses = $courseService->getCoursesWithoutPagination();
        $this->allJobs = $jobService->getJobsWithoutPagination();
        $this->allMaterials = $materialService->getMaterialsWithoutPagination();
        $this->allQuizAttempts = $quizAttemptService->getQuizAttemptsWithoutPagination();
        $this->allDivisis = $divisiService->getDivisis();
        $this->topQuizzes = $quizService->getTopQuizzesInThisMonth();
    }

    public function placeholder() {
        return view("components.loading");
    }

    public function render()
    {
        $activeQuizzes = $this->activeQuizzes;
        $allUsers = $this->allUsers;
        $topQuizzes = $this->topQuizzes;
        $allJobs = $this->allJobs;
        $allMaterials = $this->allMaterials;
        $allCourses = $this->allCourses;
        $allDivisis = $this->allDivisis;
        $quizAttempts = $this->quizAttempts;
        $quizAttemptGroupByStatusCount = $this->quizAttemptGroupByStatusCount;

        return view('livewire.admin.home-page', compact('activeQuizzes', 'allUsers','allJobs','allMaterials','allCourses','allDivisis','quizAttempts','quizAttemptGroupByStatusCount', 'topQuizzes'));
    }
}
