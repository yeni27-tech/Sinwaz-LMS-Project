<?php

namespace App\Repositoris;

use App\DTO\QuestionRequestDTO;
use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
  public function findQuestionsByQuizId($quizId)
  {
    return Question::where('quiz_id', $quizId)->lazy();
  }

  public function createQuestion(QuestionRequestDTO $request)
  {
    $question = $this -> findQuestionsByQuizId($request->quiz_id);

    return Question::create([
        'quiz_id'=> $request->quiz_id,
        'text'=> $request->text,
        'order_number'=> $question -> count(),
    ]);
  }

  public function removeQuestionById($questionId) {
    return Question::where('id', $questionId)->delete();
  }

  public function updateQuestion($id,QuestionRequestDTO $request)
  {
    $question = $this -> findQuestionsByQuizId($request->quiz_id);

    return Question::where('id', $id) -> update([
        'quiz_id'=> $request->quiz_id,
        'text'=> $request->text,
        'order_number'=> $question -> count(),
    ]);
  }

    public function updateQuestionText($questionId, $text) {
        return Question::where('id', $questionId)->update([
            'text'=> $text
        ]);
    }
}
