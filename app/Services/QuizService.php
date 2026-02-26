<?php

namespace App\Services;

use App\DTO\QuizRequestDTO;
use App\Interfaces\QuizRepositoryInterface;

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
        return $this -> quizRepositoryInterface -> updateQuiz($id, $quizRequestDTO);
    }

    public function getQuizzes() {
        return $this -> quizRepositoryInterface -> findQuizzes();
    }

    public function getTopQuizzesInThisMonth() {
        return $this -> quizRepositoryInterface -> findTop10nQuizzes();
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
        return $this -> quizRepositoryInterface -> removeQuiz($id);
    }
}
