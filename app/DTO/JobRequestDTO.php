<?php

namespace App\DTO;

class JobRequestDTO
{
   public $name;
   public $description;
   public $type;
   public $location;
   public $education;
   public $experience;
    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->type = $data["type"];
        $this->description = $data["description"];
        $this->location = $data["location"];
        $this->education = $data["education"];
        $this->experience = $data["experience"];
    }
}
