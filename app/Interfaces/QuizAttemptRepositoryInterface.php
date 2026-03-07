<?php

namespace App\Interfaces;

use App\DTO\QuizAttemptRequestDTO;

interface QuizAttemptRepositoryInterface
{
    public function findQuizAttemptById($id);
    public function findQuizAttempts();
    public function findLatestQuizAttemptByUserIdAndQuizId($userId,$quizId);
    public function findQuizAttemptsGroupByStatusInThisMonth();
    public function findLeaderboardPerMonth($take = 10);
    public function findUserHistoryQuizAttempt();
    public function findQuizAttemptGroupByStatusInThisMonth();
    public function findQuizAttemptByUserId($userId);
    public function findUserHistoryTotalQuizAttemptGroupByMonth();
    public function findHistoryTotalQuizAttemptGroupByMonth();
    public function findUserHistoryTotalQuizScoreGroupByMonth();
    public function findQuizAttemptsWithoutPagination();
    public function createQuizAttempt(QuizAttemptRequestDTO $data);
    public function submitQuizAttempt($id, $score);
    // public function createQuizAttempt(QuizAttemptRequestDTO $data);
}
