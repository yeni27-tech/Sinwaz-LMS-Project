<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController
{
    public $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function adminDashboard() {
        return view('pages.dashboard.admin.user');
    }


    public function store(UserRequest $request) {
        $vali = $this ->userService->postUser($request -> toDTO());

        dd($vali);
    }

    public function update($id, UserRequest $request) {
        return $this -> userService -> putUser($id,$request -> toDTO());
    }

    public function destroy($id) {
        return $this -> userService -> deleteUser($id);
    }
}
