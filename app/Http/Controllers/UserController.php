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

    public function create() {
        return view('pages.dashboard.admin.user.create-user');
    }

    public function edit($id) {
        return view('pages.dashboard.admin.user.update-user');
    }

    public function store(UserRequest $request) {
        $this ->userService->postUser($request -> toDTO());


        return redirect()->route('dashboard.admin.user');

    }

    public function update($id, UserRequest $request) {
        $this -> userService -> putUser($id,$request -> toDTO());

        return redirect()->route('dashboard.admin.user');
    }

    public function destroy($id) {
         $this -> userService -> deleteUser($id);
        return redirect()->route('dashboard.admin.user');

    }
}
