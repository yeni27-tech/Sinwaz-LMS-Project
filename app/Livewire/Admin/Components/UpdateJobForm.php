<?php

namespace App\Livewire\Admin\Components;

use App\DTO\JobRequestDTO;
use App\Services\DivisiService;
use App\Services\JobService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class UpdateJobForm extends Component
{
    use WithPagination;

    public $id;
    public $jobById;
    public $showUpdateJobForm = true;

    public function mount($id) {
        $jobService = app(JobService::class);

        $this->id = $id;
        $this -> jobById = $jobService -> getJobById($this -> id);
    }

    public function placeholder() {
        return view('components.loading');
    }
    public function submit() {
        $jobService = app(JobService::class);
        $dto = new JobRequestDTO([
            'description'=> $this -> jobById->description,
            'name'=> $this -> jobById->name,
            'type'=> $this -> jobById->type != null ? $this -> jobById->type : 'fulltime',
            'location'=> $this -> jobById->location != null ? $this -> jobById->location : 'cirebon',
            'education'=> $this -> jobById->education != null ? $this -> jobById->education : 'SD',
            'experience'=> $this -> jobById->experience != null ? $this -> jobById->experience : '< 1 Tahun',
        ]);

        $this -> showUpdateJobForm= false;

        $jobService -> putJob($this -> id, Auth::user() -> id,$dto);

        return redirect()->route('dashboard.admin.job');

    }

    public function closeUpdateJobForm() {
        $this -> showUpdateJobForm = false;

        return redirect()->route('dashboard.admin.job');

    }

    public function render()
    {
        return view('livewire.admin.components.update-job-form');
    }
}
