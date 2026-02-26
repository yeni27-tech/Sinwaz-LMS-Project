<?php

namespace App\Interfaces;

use App\DTO\AnswerRequestDTO;

interface AnswerRepositoryInterface
{
    public function findCorrectAnswerByQuestionId($questionId);
    public function createAnswer($questionId, AnswerRequestDTO $data);
    public function updateAnswer($id, AnswerRequestDTO $data);
    public function updateAnswerText($id,$text);
    public function updateCorrectAnswerToInCorrectAnswer($id);
    public function removeAnswer($id);
}


