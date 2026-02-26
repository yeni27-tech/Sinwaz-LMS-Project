<?php

namespace App\DTO;

class AnswerRequestDTO
{
   public $question_id;
   public string $text;
   public bool $is_correct;
    public function __construct(array $data)
    {
        $this->question_id = $data["question_id"];
        $this->is_correct = $data["is_correct"] ?? false;
        $this->text = $data["text"] ?? '';
    }
}
