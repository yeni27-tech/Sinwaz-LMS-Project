<?php

namespace App\Livewire\Admin\Components;

use App\Services\CourseService;
use App\Services\MaterialService;
use Livewire\Component;

class UpdateMaterialForm extends Component
{
    public $id;
    public $materialById;
    public $coursesData;
    public $yt_video_link;
    public function mount($id) {
        $materialService = app(MaterialService::class);
        $courseService = app(CourseService::class);

        $this->id = $id;
        $this->materialById = $materialService -> getMaterialById($this -> id) ;
        $this->coursesData = $courseService -> getCoursesWithoutPagination() ;
        $this -> yt_video_link = $this -> materialById -> yt_video_link;
    }

    public function inputYTVideoLink($value) {
        $this -> yt_video_link = $value;
    }
        public function render()
    {
        return view('livewire.admin.components.update-material-form');
    }
}
