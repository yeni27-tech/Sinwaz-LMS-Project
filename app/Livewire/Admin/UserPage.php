<?php

namespace App\Livewire\Admin;

use App\DTO\UserRequestDTO;
use App\Services\DivisiService;
use App\Services\UserService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class UserPage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $email;
    public $id;
    public $name;
    public $role;
    public $divisi_id;
    public $number_phone;
    public $password;
    public bool $showCreateUserForm = false;
    public bool $showUpdateUserForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function users()
    {
        $userService = app(UserService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $userService->getAllUser();
        }


    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
    }

    #[Computed]
    public function usersPagination()
    {
        $userService = app(UserService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $userService->getUsersPagination($this-> search, $this->perPage);
    }

    public function render()
    {
        $showCreateUserForm = $this-> showCreateUserForm;

        return view('livewire.admin.user-page', compact('showCreateUserForm'));
    }

    public function openCreateUserForm() {
        $this->showCreateUserForm = true;
    }

    public function closeCreateUserForm() {
       return $this->showCreateUserForm = false;
    }

    public function openUpdateUserForm($id,$name,$role,$divisi_id, $email,$number_phone,$password) {
        $this->name = $name;
        $this->id = $id;
        $this->role = $role;
        $this->divisi_id = $divisi_id;
        $this->email = $email;
        $this->number_phone = $number_phone;
        $this->password = $password;

        $this->showUpdateUserForm = true;
    }

    public function closeUpdateUserForm() {
        $this->showUpdateUserForm = false;
    }

     public function submit($id) {
        $userService = app(UserService::class);
        $dto = new UserRequestDTO([
            'email'=> $this->email,
            'password'=> $this->password,
            'name'=> $this->name,
            'number_phone'=> $this->number_phone,
            'divisi_id'=> $this->divisi_id,
            'role'=> $this->role,
        ]);

        $this -> showCreateUserForm = false;

        return $userService -> putUser($id,$dto);
    }

    public function delete($id) {
        $userService = app(UserService::class);

        $userService -> deleteUser($id);


    }
    public function deleteConfirm($id) {
          $this->dispatch('deleteConfirm');

        // return redirect()->route('dashboard.admin.user');
    }

}
