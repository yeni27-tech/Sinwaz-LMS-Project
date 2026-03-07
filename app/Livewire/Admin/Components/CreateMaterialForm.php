<?php

namespace App\Livewire\Admin\Components;

use App\Services\CourseService;
use Livewire\Component;

class CreateMaterialForm extends Component
{
    public $coursesData;
    public $corseId;
    public $yt_video_link = "https://www.youtube.com/embed/tgbNymZ7vqY";
    public function mount() {
        $courseService = app(CourseService::class);


        $this->coursesData = $courseService->getCoursesWithoutPagination();
    }

    public function inputYTVideoLink($value) {
        $this -> yt_video_link = $value;
    }

    public function render()
    {
        return view('livewire.admin.components.create-material-form');
    }
}
