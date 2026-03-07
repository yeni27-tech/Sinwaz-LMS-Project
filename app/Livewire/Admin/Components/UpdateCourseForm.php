<?php

namespace App\Livewire\Admin\Components;

use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use App\Services\DivisiService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class UpdateCourseForm extends Component
{
    use WithPagination, WithSweetAlert;

    public $id;
    public $courseById;

    public function mount($id) {
        $courseService = app(CourseService::class);

        $this->id = $id;
        $this -> courseById=$courseService -> getCourseById($this ->id);
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
        $request = new CourseRequest();

        $courseService -> putCourse($this -> id,Auth::user() -> id,$request -> toDTO());

        return redirect()->route('dashboard.admin.course');

    }

    public function closeUpdateCourseForm() {

        return redirect()->route('dashboard.admin.course');

    }
}
