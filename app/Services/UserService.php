<?php

namespace App\Services;

use App\DTO\UserRequestDTO;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use SweetAlert2\Laravel\Swal;

class UserService
{
    public $userRepositoryInterface;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function getAllUser() {
        try {
            $users = $this->userRepositoryInterface->findAllUser();

            return $users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getUsersPagination(string $search = '', int $perPage = 10) {
        try {
            $users = $this->userRepositoryInterface->findAllUserPagination($search, $perPage);

            return $users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getUsersWithoutPagination() {
        $users = $this->userRepositoryInterface->findAllUserWithoutPagination();

        return $users;
    }

    public function postUser(UserRequestDTO $userRequest) {
        try {
            $userExist = User::where(
                "email", $userRequest -> email)->first();

            if ($userExist) {
                Throw new \Exception("User already exist");
            }

            $user = $this->userRepositoryInterface->createUser($userRequest);

            Swal::success([
                'title' => 'Create user successfully',
            ]);

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function putUser($id, UserRequestDTO $userRequest) {
        $this -> userRepositoryInterface ->updateUser($id, $userRequest);
    }

    public function deleteUser($id) {
        $this -> userRepositoryInterface ->removeUser($id);
    }
}
