<?php

namespace App\Livewire\Admin\Components;

use App\DTO\CourseRequestDTO;
use App\DTO\JobRequestDTO;
use App\Services\CourseService;
use App\Services\DivisiService;
use App\Services\JobService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CreateJobForm extends Component
{
    use WithPagination;

    public $name;
    public $description;
    public $type;
    public $location;
    public $education;
    public $experience;
    public $showCreateJobForm = true;

    public function mount($showCreateJobForm) {
        $this->showCreateJobForm = $showCreateJobForm;
    }

    public function placeholder() {
        return view('components.loading');
    }

    #[Computed]
    public function divisisData() {
        $divisiService = app(DivisiService::class);

        return $divisiService -> getDivisisWithoutPagination();
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

        $this -> showCreateJobForm= false;

        $jobService -> postJob(Auth::user() -> id,$dto);

        return redirect()->route('dashboard.admin.job');

    }

    public function closeCreateJobForm() {
        $this -> showCreateJobForm = false;

        return redirect()->route('dashboard.admin.job');

    }

    public function render()
    {
        return view('livewire.admin.components.create-job-form');
    }
}
