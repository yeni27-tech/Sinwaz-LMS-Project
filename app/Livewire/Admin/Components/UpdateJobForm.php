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

    public $name;
    public $id;
    public $description;
    public $type;
    public $location;
    public $education;
    public $experience;
    public $showUpdateJobForm = true;

    public function mount($id,$name,$description,$type,$location,$education,$experience) {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->location = $location;
        $this->education = $education;
        $this->experience = $experience;
        $this->id = $id;    }

    public function placeholder() {
        return view('components.loading');
    }
    public function submit() {
        $jobService = app(JobService::class);
        $dto = new JobRequestDTO([
            'description'=> $this->description,
            'name'=> $this->name,
            'type'=> $this->type != null ? $this->type : 'fulltime',
            'location'=> $this->location != null ? $this->location : 'cirebon',
            'education'=> $this->education != null ? $this->education : 'SD',
            'experience'=> $this->experience != null ? $this->experience : '< 1 Tahun',
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
