<?php

namespace App\Services;

use App\DTO\AnswerRequestDTO;
use App\Interfaces\AnswerRepositoryInterface;

class AnswerService
{
    public AnswerRepositoryInterface $answerRepositoryInterface;
    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepositoryInterface = $answerRepository;
    }

    public function postAnswer($questionId) {
        try {
            $correctAnswer = $this->answerRepositoryInterface->findCorrectAnswerByQuestionId($questionId) -> count();
            if($correctAnswer > 0) {
                $dto = new AnswerRequestDTO([
                    'question_id' => $questionId,
                    'text' => '',
                    'is_correct' => 1,
                ]);

                return $this ->answerRepositoryInterface->createAnswer($questionId,$dto);
            }

                 $dto = new AnswerRequestDTO([
                    'question_id' => $questionId,
                    'text' => '',
                    'is_correct' => 0,
                ]);

                return $this ->answerRepositoryInterface->createAnswer($questionId,$dto);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function pickCorrectAnswer($answerId,$questionId) {
        try {
            $dto = new AnswerRequestDTO([
                'question_id' => $questionId,
                'is_correct' => true,
            ]);

            $this ->answerRepositoryInterface->updateCorrectAnswerToInCorrectAnswer($questionId);
            $this -> answerRepositoryInterface -> updateAnswer($answerId,$dto);
        } catch (\Throwable $th) {
            throw $th;;
        }
    }

    public function putAnswer($id, AnswerRequestDTO $answerRequestDTO) {
        try {
            return $this ->answerRepositoryInterface->updateAnswer($id, $answerRequestDTO);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function putAnswerText($id, $text) {
        try {
            return $this ->answerRepositoryInterface->updateAnswerText($id, $text);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteAnswer($id) {
        try {
            return $this -> answerRepositoryInterface -> removeAnswer($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
