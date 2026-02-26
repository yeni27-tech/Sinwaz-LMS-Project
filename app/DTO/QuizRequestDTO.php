<?php

namespace App\DTO;

class QuizRequestDTO
{
    public $name;
    public $description;
    public $divisi_id;
    // public $is_active;
    // public $duration;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->divisi_id = $data['divisi_id'];
        // $this->is_active = $data['is_active'];
        // $this->duration = $data['duration'];
    }
}
