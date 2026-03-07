<?php

namespace App\Livewire\Admin;

use App\Services\CourseService;
use App\Services\MaterialService;
use Livewire\Component;

class CourseDetailPage extends Component
{
    public $id;
    public $materialsData;
    public function mount($id) {
        $materialService = app(MaterialService::class);
        $this->id = $id;
        $this ->materialsData = $materialService->getAllMaterialByCourseId($this->id);
    }

    public function render()
    {
        return view('livewire.admin.course-detail-page');
    }
}
