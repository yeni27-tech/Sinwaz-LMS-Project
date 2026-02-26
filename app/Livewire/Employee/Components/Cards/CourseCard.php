<?php

namespace App\Livewire\Employee\Components\Cards;

use App\Services\CourseService;
use Livewire\Component;

class CourseCard extends Component
{
    public $id;
    public $courseById;
    public function mount($id) {
        $courseService = app(CourseService::class);

        $this->id = $id;
        $this->courseById = $courseService -> getCourseById( $this->id );

    }
    public function render()
    {
        return view('livewire.employee.components.cards.course-card');
    }
}
