<?php

namespace App\Services;

use App\DTO\QuizAttemptAnswerRequestDTO;
use App\Http\Requests\QuizAttemptAnswerRequest;
use App\Interfaces\QuizAttemptAnswerRepositoryInterface;

class QuizAttemptAnswerService
{
    public QuizAttemptAnswerRepositoryInterface $quizAttemptAnswerRepositoryInterface;
    public function __construct(QuizAttemptAnswerRepositoryInterface $quizAttemptAnswerRepositoryInterface)
    {
        $this->quizAttemptAnswerRepositoryInterface = $quizAttemptAnswerRepositoryInterface;
    }

    public function postQuizAttemptAnswerByPick( QuizAttemptAnswerRequestDTO $quizAttemptAnswerRequQuizAttemptAnswerRequest) {
        $answerExist = $this -> quizAttemptAnswerRepositoryInterface->findQuizAttemptAnswerByQuizAttemptIdAndQuestionId($quizAttemptAnswerRequQuizAttemptAnswerRequest ->quiz_attempt_id, $quizAttemptAnswerRequQuizAttemptAnswerRequest ->question_id) -> get();


        if($answerExist -> count() <= 0) {
            $this ->quizAttemptAnswerRepositoryInterface -> createQuizAttemptAnswerByPick($quizAttemptAnswerRequQuizAttemptAnswerRequest);
        }

        $this ->quizAttemptAnswerRepositoryInterface -> updateQuizAttemptAnswerByPick($answerExist[0] -> id,$quizAttemptAnswerRequQuizAttemptAnswerRequest);
    }

    public function getQuizAttemptAnswersByQuizAttemptId($quizAttemptId) {
        return $this -> quizAttemptAnswerRepositoryInterface -> findQuizAttemptAnswersByQuizAttemptId($quizAttemptId);
    }
}
