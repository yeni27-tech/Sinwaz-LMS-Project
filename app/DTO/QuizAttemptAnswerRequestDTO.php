<?php

namespace App\DTO;

class QuizAttemptAnswerRequestDTO
{
    public $quiz_attempt_id;
    public $question_id;
    public $answer_id;
    public $answer_text;
    public function __construct(array $data)
    {
        $this->quiz_attempt_id = $data["quiz_attempt_id"];
        $this->answer_id = $data["answer_id"];
        $this->question_id = $data["question_id"];
        $this->answer_text = $data["answer_text"];
    }
}
