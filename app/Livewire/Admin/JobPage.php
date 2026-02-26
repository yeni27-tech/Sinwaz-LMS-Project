<?php

namespace App\Livewire\Admin;

use App\Services\JobService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class JobPage extends Component
{
    use WithPagination;
    use WithSweetAlert;
    public $id;
    public $name;
    public $description;
    public $type;
    public $location;
    public $education;
    public $experience;
    public bool $showCreateJobForm = false;
    public bool $showUpdateJobForm = false;


    #[Url(as: 'search', except: '')]
    public string $search = '';

    public int $perPage = 10;

    public function placeholder() {
        return view('components.loading');
    }

    public function jobService() {
        return app(JobService::class);
    }
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function quizzes()
    {
        $jobService = app(JobService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $jobService->getJobsWithoutPagination();
    }

    #[Computed]
    public function jobPagination()
    {
        $jobService = app(JobService::class);

        // Pastikan getUsers menerima search/perPage biar rapi (lihat service di bawah)
        return $jobService->getAllJobPagination($this-> search, $this->perPage);
    }


    public function openCreateJobForm() {
        $this->showCreateJobForm = true;
    }

    public function closeCreateJobForm() {
       return $this->showCreateJobForm = false;
    }

    public function openUpdateJobForm($id,$name,$description,$type,$location,$education,$experience) {
        $this->name = $name;
        $this->id = $id;
        $this->description = $description;
        $this->type = $type;
        $this->location = $location;
        $this->education = $education;
        $this->experience = $experience;

        $this->showUpdateJobForm = true;
    }

    public function closeUpdateJobForm() {
        $this->showUpdateJobForm = false;
    }

    public function deleteJob($id) {
        $jobService = app(JobService::class);

        return $jobService->deleteJob($id);
    }

    public function render()
    {
        return view('livewire.admin.job-page');
    }
}
