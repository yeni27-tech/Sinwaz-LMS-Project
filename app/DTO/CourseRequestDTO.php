<?php

namespace App\DTO;

class CourseRequestDTO
{
    public $divisi_id;
    public $name;
    public $description;
    public function __construct(array $data)
    {
        $this->divisi_id = $data["divisi_id"];
        $this->name = $data["name"];
        $this->description = $data["description"];
    }
}
