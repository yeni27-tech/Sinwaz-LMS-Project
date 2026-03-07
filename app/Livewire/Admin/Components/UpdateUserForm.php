<?php

namespace App\Livewire\Admin\Components;

use App\DTO\UserRequestDTO;
use App\Services\DivisiService;
use App\Services\UserService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UpdateUserForm extends Component
{
    use WithPagination;

    public $id;
    public $userById;
    public $showUpdateUserForm = false;
    public $showCreateUserForm = false;

    public function mount($id) {
        $userService = app(UserService::class);
        $this->id = $id;

        $this -> userById = $userService->getUserById($this->id);
    }

    public function placeholder() {
        return view('components.loading');
    }

    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
    }

    public function submit($id) {
        $userService = app(UserService::class);
        $dto = new UserRequestDTO([
            'email'=> $this -> userById->email,
            'password'=> $this -> userById->password,
            'name'=> $this -> userById->name,
            'number_phone'=> $this -> userById->number_phone,
            'divisi_id'=> $this -> userById->divisi_id,
            'role'=> $this -> userById->role,

        ]);

        $this -> showUpdateUserForm= false;
        $userService -> putUser($id, $dto);

        return redirect()->route('dashboard.admin.user');
    }

    public function render()
    {
        return view('livewire.admin.components.update-user-form');
    }

     public function closeUpdateUserForm() {
        $this -> showCreateUserForm = false;

        return redirect()->route('dashboard.admin.user');

    }
}
