<?php

namespace App\Livewire\Admin\Components;

use App\Services\MaterialService;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class MaterialCard extends Component
{
     use WithPagination,WithSweetAlert;
    public $id;
    public $materialById;
    public function mount($id) {
        $materialService = app(MaterialService::class);

        $this->id = $id;
        $this->materialById = $materialService->getMaterialById($id);
    }
    public function render()
    {
        return view('livewire.admin.components.material-card');
    }
}
