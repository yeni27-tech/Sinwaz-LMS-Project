<?php

namespace App\Livewire\Employee\Components;

use Illuminate\Http\Request;
use Livewire\Component;

class SidebarResponsive extends Component
{
    public bool $sidebarOpen = false;
    public $pathName = "";

    public function mount(Request $request) {
        $this -> pathName = $request -> path();
    }
    public function render()
    {
        return view('livewire.employee.components.sidebar-responsive');
    }
}
