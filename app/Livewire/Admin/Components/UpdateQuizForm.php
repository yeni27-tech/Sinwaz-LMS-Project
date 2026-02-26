<?php

namespace App\Livewire\Admin\Components;

use App\DTO\QuizRequestDTO;
use App\Services\DivisiService;
use App\Services\QuizService;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UpdateQuizForm extends Component
{
    use WithPagination;

    public $email;
    public $id;
    public $name;
    public $role;
    public $divisi_id;
    public $number_phone;
    public $password;
    public $showCreateQuizForm;
    public $showUpdateQuizForm;

    public function mount($name,$role,$divisi_id,$number_phone,$email,$password) {
        $this->name = $name;
        $this->role = $role;
        $this->divisi_id = $divisi_id;
        $this->number_phone = $number_phone;
        $this->email = $email;
        $this->password = $password;
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
        $quizService = app(QuizService::class);
        $dto = new QuizRequestDTO([
            'email'=> $this->email,
            'password'=> $this->password,
            'name'=> $this->name,
            'number_phone'=> $this->number_phone,
            'divisi_id'=> $this->divisi_id,
            'role'=> $this->role,

        ]);

        $this -> showUpdateQuizForm= false;
        // $quizService -> ($id, $dto);

        return redirect()->route('dashboard.admin.quiz');
    }

    public function render()
    {
        return view('livewire.admin.components.update-user-form');
    }

     public function closeUpdateQuizForm() {
        $this -> showCreateQuizForm = false;

        return redirect()->route('dashboard.admin.quiz');

    }
}
