<?php

namespace App\Interfaces;

use App\DTO\QuizAttemptRequestDTO;

interface QuizAttemptRepositoryInterface
{
    public function findQuizAttemptById($id);
    public function findQuizAttempts();
    public function findLatestQuizAttemptByUserIdAndQuizId($userId,$quizId);
    public function findQuizAttemptsGroupByStatusInThisMonth();
    public function findLeaderboardPerMonth();
    public function findUserHistoryQuizAttempt();
    public function findUserHistoryQuizAttemptGroupByMonth();
    public function findUserHistoryTotalQuizScoreGroupByMonth();
    public function findQuizAttemptsWithoutPagination();
    public function createQuizAttempt(QuizAttemptRequestDTO $data);
    public function submitQuizAttempt($id, $score);
    // public function createQuizAttempt(QuizAttemptRequestDTO $data);
}
