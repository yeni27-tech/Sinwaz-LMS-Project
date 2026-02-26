<?php

namespace App\Livewire\Admin\Components;

use App\DTO\CourseRequestDTO;
use App\DTO\UserRequestDTO;
use App\Services\CourseService;
use App\Services\DivisiService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class CreateCourseForm extends Component
{
    use WithPagination;

    public $email;
    public $name;
    public $divisi_id;
    public $description;
    public $showCreateCourseForm = true;

    public function mount($showCreateCourseForm) {
        $this->showCreateCourseForm = $showCreateCourseForm;
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
        return view('livewire.admin.components.create-course-form');
    }

    public function submit() {
        $courseService = app(CourseService::class);
        $dto = new CourseRequestDTO([
            'description'=> $this->description,
            'name'=> $this->name,
            'divisi_id'=> $this->divisi_id,
        ]);

        $this -> showCreateCourseForm= false;

        $courseService -> postCourse(Auth::user() -> id,$dto);

        return redirect()->route('dashboard.admin.course');

    }

    public function closeCreateCourseForm() {
        $this -> showCreateCourseForm = false;

        return redirect()->route('dashboard.admin.course');

    }
}
