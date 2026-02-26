<?php

namespace App\Livewire\Divisi;

use App\Services\DivisiService;
use Livewire\Component;
use Livewire\WithPagination;

class DivisiTable extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('components.loading');
    }


    public function render(DivisiService $divisiService)
    {
        $allDivisi = $divisiService->getDivisis();

        return view('livewire.components.tables.divisi', compact('allDivisi'));
    }
}
