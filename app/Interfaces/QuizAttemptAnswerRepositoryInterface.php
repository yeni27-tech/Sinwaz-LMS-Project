<?php

namespace App\Interfaces;

use App\DTO\QuizAttemptAnswerRequestDTO;

interface QuizAttemptAnswerRepositoryInterface
{
    public function createQuizAttemptAnswerByPick(QuizAttemptAnswerRequestDTO $quizAttemptAnswerRequestDTO);
    public function updateQuizAttemptAnswerByPick($id,QuizAttemptAnswerRequestDTO $quizAttemptAnswerRequestDTO);
    public function findQuizAttemptAnswerByQuizAttemptIdAndQuestionId($quizAttemptId, $questionId);
    public function findQuizAttemptAnswersByQuizAttemptId($quizAttemptId);
}
