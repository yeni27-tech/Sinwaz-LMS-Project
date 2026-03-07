<?php

namespace App\DTO;

class UserRequestDTO
{
    public $divisiId;
    public $name;
    public $email;
    public $password;
    public $numberPhone;
    public $role;
    public $divisi_id;
    public function __construct(array $data)
    {
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->numberPhone = $data["number_phone"];
        $this->role = $data["role"];
        $this->divisi_id = $data["divisi_id"];

    }
}
