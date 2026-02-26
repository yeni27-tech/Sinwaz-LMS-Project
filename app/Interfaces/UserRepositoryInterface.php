<?php

namespace App\Interfaces;

use App\DTO\UserRequestDTO;

interface UserRepositoryInterface
{
    public function findAllUser();
    public function findAllUserPagination(string $search = '', int $perPage = 10);
    public function findAllUserWithoutPagination();
    public function createUser(UserRequestDTO $data);
    public function updateUser($id, UserRequestDTO $data);
    public function removeUser($id);
}
