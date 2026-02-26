<?php

namespace App\DTO;

class QuizAttemptRequestDTO
{
    public $quiz_id;
    public $user_id;
    public $score;
    public $status;
    public $submitted_at;
    public function __construct(array $data)
    {
        $this->quiz_id = $data["quiz_id"];
        $this->user_id = $data["user_id"];
        $this->score = $data["score"];
        $this->status = $data["status"];
        $this->submitted_at = $data["submitted_at"];
    }
}
