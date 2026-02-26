<?php

namespace App\Repositoris;

use App\DTO\QuizAttemptAnswerRequestDTO;
use App\Interfaces\QuizAttemptAnswerRepositoryInterface;
use App\Models\QuizAttemptAnswer;

class QuizAttemptAnswerRepository implements QuizAttemptAnswerRepositoryInterface
{
    public function findQuizAttemptAnswerByQuizAttemptIdAndQuestionId($quizAttemptId, $question_id)
    {
        return QuizAttemptAnswer::where('quiz_attempt_id', $quizAttemptId) -> where('question_id', $question_id);
    }
    public function createQuizAttemptAnswerByPick(QuizAttemptAnswerRequestDTO $quizAttemptAnswerRequestDTO) {
        return QuizAttemptAnswer::create([
            "quiz_attempt_id" => $quizAttemptAnswerRequestDTO -> quiz_attempt_id,
            "question_id" => $quizAttemptAnswerRequestDTO -> question_id,
            "answer_id" => $quizAttemptAnswerRequestDTO -> answer_id,
        ]);
    }
    public function updateQuizAttemptAnswerByPick($id,QuizAttemptAnswerRequestDTO $quizAttemptAnswerRequestDTO) {
        return QuizAttemptAnswer::where('id', $id) ->update([
            "quiz_attempt_id" => $quizAttemptAnswerRequestDTO -> quiz_attempt_id,
            "question_id" => $quizAttemptAnswerRequestDTO -> question_id,
            "answer_id" => $quizAttemptAnswerRequestDTO -> answer_id,
        ]);
    }

    public function findQuizAttemptAnswersByQuizAttemptId($quizAttemptId) {
        return QuizAttemptAnswer::where('quiz_attempt_id', $quizAttemptId) -> get();
    }
}
