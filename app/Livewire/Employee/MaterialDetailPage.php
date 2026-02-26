<?php

namespace App\Livewire\Employee;

use App\Services\MaterialService;
use Livewire\Component;

class MaterialDetailPage extends Component
{
    public $id;
    public $materialById;
    public $materialsData;
    public function mount($id) {
        $materialService = app(MaterialService::class);

        $this->id = $id;
        $this->materialById = $materialService->getMaterialById($id);
        $this->materialsData = $materialService->getMaterialsWithoutPagination() -> where('course_id',$this -> materialById -> course_id);
    }
    public function render()
    {
        return view('livewire.employee.material-detail-page');
    }
}
