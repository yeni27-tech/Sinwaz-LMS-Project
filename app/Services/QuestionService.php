<?php

namespace App\Services;

use App\DTO\QuestionRequestDTO;
use App\Interfaces\QuestionRepositoryInterface;

class QuestionService
{
    public QuestionRepositoryInterface $questionRepositoryInterface;

    public function __construct(QuestionRepositoryInterface $questionRepositoryInterface)
    {
        $this->questionRepositoryInterface = $questionRepositoryInterface;
    }

    public function getQuestionsByQuizId($quizId) {
        return $this -> questionRepositoryInterface -> findQuestionsByQuizId($quizId);
    }

    public function postQuestion(QuestionRequestDTO $questionRequestDTO) {
        return $this -> questionRepositoryInterface ->createQuestion($questionRequestDTO);
    }

    public function patchQuestionText($questionId, $text) {
        return $this -> questionRepositoryInterface -> updateQuestionText($questionId, $text);
    }

    public function deleteQuestionById($id) {
        $this -> questionRepositoryInterface -> removeQuestionById($id);
    }
}
