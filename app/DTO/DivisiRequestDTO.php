<?php

namespace App\DTO;

class DivisiRequestDTO
{
    public string $name;
    public function __construct(array $data)
    {
        $this->name = $data["name"];
    }
}
