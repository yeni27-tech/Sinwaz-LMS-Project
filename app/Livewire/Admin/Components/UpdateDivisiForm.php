<?php

namespace App\Livewire\Admin\Components;

use App\Services\DivisiService;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class UpdateDivisiForm extends Component
{
    use WithPagination, WithSweetAlert;

    public $id;
    public $divisiById;

    public function placeholder() {
        return view('components.loading');
    }

    public function mount($id) {
        $divisiService = app(DivisiService::class);

        $this->id = $id;
        $this -> divisiById=$divisiService -> getDivisi($this ->id);
    }

    public function render()
    {
        return view('livewire.admin.components.update-divisi-form');
    }
}
