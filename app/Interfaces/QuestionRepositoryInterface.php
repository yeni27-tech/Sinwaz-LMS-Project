<?php

namespace App\Interfaces;

use App\DTO\QuestionRequestDTO;

interface QuestionRepositoryInterface
{
    public function findQuestionsByQuizId($quizId);
    public function createQuestion(QuestionRequestDTO $data);
    public function updateQuestion($id, QuestionRequestDTO $data);
    public function updateQuestionText($questionId, $text);

    public function removeQuestionById($id);
}
