<?php

namespace App\Livewire\Employee;

use App\Services\CourseService;
use App\Services\MaterialService;
use Livewire\Component;

class CourseDetailPage extends Component
{
    public $id;
    public $courseById;
    public $materialsData;
    public function mount($id) {
        $courseService = app(CourseService::class);
        $materialService = app(MaterialService::class);

        $this -> id = $id;
        $this -> courseById = $courseService -> getCourseById($this ->id);
        $this -> materialsData = $materialService -> getMaterialsWithoutPagination() -> where("course_id", $this -> id);
    }

    public function placeholder() {
        return view('components.loading');
    }
    public function render()
    {
        return view('livewire.employee.course-detail-page');
    }
}
