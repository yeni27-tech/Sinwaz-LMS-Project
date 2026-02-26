<?php

namespace App\Livewire\Admin;

use App\Services\QuizService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class QuizPage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $id;
    public $name;
    public $description;
    public $divisi_id;
    public bool $showCreateQuizForm = false;
    public bool $showUpdateQuizForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }

    public function quizService() {
        return app(QuizService::class);
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function quizzes()
    {
        $quizService = app(QuizService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $quizService->getAllQuizzes();
    }


    // #[Computed]
    // public function divisisData() {
    //     $divisiService = app(DivisiService::class);

    //     return $divisiService -> getDivisisWithoutPagination();
    // }

    #[Computed]
    public function quizzesPagination()
    {
        $quizService = app(QuizService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $quizService->getAllQuizPagination($this-> search, $this->perPage);
    }


    public function openCreateQuizForm() {
        $this->showCreateQuizForm = true;
    }

    public function closeCreateQuizForm() {
       return $this->showCreateQuizForm = false;
    }

    public function openUpdateQuizForm($id,$name,$description,$divisi_id) {
        $this->name = $name;
        $this->id = $id;
        $this->description = $description;
        $this->divisi_id = $divisi_id;

        $this->showUpdateQuizForm = true;
    }

    public function closeUpdateQuizForm() {
        $this->showUpdateQuizForm = false;
    }

    public function deleteQuiz($id) {
        $quizService = app(QuizService::class);

        return $quizService->deleteQuiz($id);
    }

    public function render()
    {
        return view('livewire.admin.quiz-page');
    }
}
