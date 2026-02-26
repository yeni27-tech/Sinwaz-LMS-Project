<?php

namespace App\DTO;

class UserRequestDTO
{
    public $divisiId;
    public $name;
    public $email;
    public $password;
    public $numberPhone;
    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->numberPhone = $data["number_phone"];

    }
}
