<?php

namespace App\Livewire\Admin\Components;

use App\DTO\UserRequestDTO;
use App\Services\DivisiService;
use App\Services\UserService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CreateUserForm extends Component
{
    use WithPagination;

    public $email;
    public $name;
    public $role;
    public $divisi_id;
    public $number_phone;
    public $password;
    public $showCreateUserForm = true;

    public function mount($showCreateUserForm) {
        $this->showCreateUserForm = $showCreateUserForm;
    }

    public function placeholder() {
        return view('components.loading');
    }

    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
    }
    public function render()
    {
        return view('livewire.admin.components.create-user-form');
    }

    public function submit() {
        $userService = app(UserService::class);
        $dto = new UserRequestDTO([
            'email'=> $this->email,
            'password'=> $this->password,
            'name'=> $this->name,
            'number_phone'=> $this->number_phone,
            'divisi_id'=> $this->divisi_id,
            'role'=> $this->role,

        ]);

        $this -> showCreateUserForm= false;

        $userService -> postUser($dto);

        return redirect()->route('dashboard.admin.user');

    }

    public function closeCreateUserForm() {
        $this -> showCreateUserForm = false;

        return redirect()->route('dashboard.admin.user');

    }
}
