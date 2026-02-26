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

class UpdateCourseForm extends Component
{
    use WithPagination;

    public $email;
    public $name;
    public $id;
    public $divisi_id;
    public $description;
    public $showUpdateCourseForm = true;

    public function mount($id,$name,$description,$divisi_id) {
        $this->name = $name;
        $this->description = $description;
        $this->divisi_id = $divisi_id;
        $this->id = $id;
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
        return view('livewire.admin.components.update-course-form');
    }

    public function submit() {
        $courseService = app(CourseService::class);
        $dto = new CourseRequestDTO([
            'description'=> $this->description,
            'name'=> $this->name,
            'divisi_id'=> $this->divisi_id != null ? $this->divisi_id : null,
        ]);

        $this -> showUpdateCourseForm = false;

        $courseService -> putCourse($this -> id,Auth::user() -> id,$dto);

        return redirect()->route('dashboard.admin.course');

    }

    public function closeUpdateCourseForm() {
        $this -> showUpdateCourseForm = false;

        return redirect()->route('dashboard.admin.course');

    }
}
