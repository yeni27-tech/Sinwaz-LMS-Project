<?php

namespace App\Services;

use App\DTO\QuizAttemptRequestDTO;
use App\Interfaces\QuizAttemptRepositoryInterface;

class QuizAttemptService
{
    public QuizAttemptRepositoryInterface $quizAttemptRepositoryInterface;
    public function __construct(QuizAttemptRepositoryInterface $quizAttemptRepositoryInterface)
    {
        $this->quizAttemptRepositoryInterface = $quizAttemptRepositoryInterface;
    }

    public function getQuizAttemptById($id) {
        try {
            return $this->quizAttemptRepositoryInterface->findQuizAttemptById($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getLatestQuizAttemptByUserId($userId,$quizId) {
        try {
            return $this -> quizAttemptRepositoryInterface -> findLatestQuizAttemptByUserIdAndQuizId($userId,$quizId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getLeaderboardsPerMonth() {
        try {
            return $this -> quizAttemptRepositoryInterface->findLeaderboardPerMonth();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getQuizAttempts($id) {
        try {
            return $this->quizAttemptRepositoryInterface->findQuizAttempts();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getQuizAttemptsWithoutPagination() {
        try {
            return $this->quizAttemptRepositoryInterface->findQuizAttemptsWithoutPagination();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function getQuizAttemptsGroupByStatusInThisMonth() {
        try {
            return $this->quizAttemptRepositoryInterface->findQuizAttemptsGroupByStatusInThisMonth();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function postQuizAttempt(QuizAttemptRequestDTO $quizAttemptRequestDTO) {
        try {
            return $this -> quizAttemptRepositoryInterface->createQuizAttempt($quizAttemptRequestDTO);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function submitQuiz($quizAttemptId, $score) {
        try {
            return $this -> quizAttemptRepositoryInterface->submitQuizAttempt($quizAttemptId, $score);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
