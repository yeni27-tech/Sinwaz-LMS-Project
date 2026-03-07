<?php

namespace App\Services;

use App\DTO\QuizRequestDTO;
use App\Interfaces\QuizRepositoryInterface;
use SweetAlert2\Laravel\Swal;

use function Livewire\Volt\title;

class QuizService
{
    public QuizRepositoryInterface $quizRepositoryInterface;
    public function __construct(QuizRepositoryInterface $quizRepositoryInterface)
    {
        $this->quizRepositoryInterface = $quizRepositoryInterface;
    }

    public function postQuiz(QuizRequestDTO $quizRequestDTO) {
        return $this -> quizRepositoryInterface -> createQuiz($quizRequestDTO);
    }

    public function putQuiz($id, QuizRequestDTO $quizRequestDTO) {
        $this -> quizRepositoryInterface -> updateQuiz($id, $quizRequestDTO);

    }

    public function getQuizzes() {
        return $this -> quizRepositoryInterface -> findQuizzes();
    }

    public function getTopQuizzesInThisMonth($take = 10) {
        return $this -> quizRepositoryInterface -> findTopQuizzesPerMonth($take);
    }

    public function activatedQuiz($id) {
        return $this -> quizRepositoryInterface -> findActivateQuiz($id);
    }

    public function nonActivatedQuiz($id) {
        return $this -> quizRepositoryInterface -> findNonActivateQuiz($id);
    }

    public function getAllQuizzes() {
        return $this -> quizRepositoryInterface -> findAllQuizzes();
    }

    public function getAllQuizPagination ($search = '', int $perPage = 10) {
        return $this -> quizRepositoryInterface -> findAllQuizPagination($search, $perPage);
    }

    public function getQuizById($id) {
        return $this -> quizRepositoryInterface -> findQuizById($id);
    }

    public function getActiveQuizzes() {
        return $this -> quizRepositoryInterface -> findActiveQuizzes();
    }

    public function deleteQuiz($id) {
        $this -> quizRepositoryInterface -> removeQuiz($id);

        Swal::success([
            'title' => 'Delete Quiz Successfully'
        ]);
    }
}
