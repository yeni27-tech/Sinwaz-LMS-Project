<?php

namespace App\DTO;

class QuestionRequestDTO
{
    public $quiz_id;
    public int $order_number;
    public string $text;

    public function __construct(array $data)
    {
        $this->quiz_id = $data["quiz_id"];
        $this->text = $data["text"];
        $this->order_number = $data["order_number"];
    }
}
