<?php

namespace App\Repositoris;

use App\DTO\AnswerRequestDTO;
use App\Interfaces\AnswerRepositoryInterface;
use App\Models\Answer;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function findCorrectAnswerByQuestionId($questionId)
    {
        return Answer::where('question_id', $questionId) -> where('is_correct',1) -> get();
    }

    public function updateCorrectAnswerToInCorrectAnswer($questionId) {
       return Answer::where('is_correct', true) ->where('question_id', $questionId) -> update([
        'is_correct' => false
       ]);
    }
    public function createAnswer($questionId, AnswerRequestDTO $data)
    {
        $newAnswer = Answer::create([
            'question_id' => $questionId,
            'text' => $data->text,
        ]);

        return $newAnswer;
    }

    public function updateAnswer($id, AnswerRequestDTO $data)
    {
        return Answer::where('id', $id)->update([
            'is_correct' => $data -> is_correct,
        ]);
    }

    public function updateAnswerText($id, $text)
    {
        return Answer::where('id', $id)->update([
            'text' => $text,

        ]);
    }

    public function removeAnswer($id)
    {
        return Answer::where('id', $id)->delete();
    }
}
