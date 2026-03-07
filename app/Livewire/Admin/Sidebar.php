<?php

namespace App\Livewire\Admin;

use Illuminate\Http\Request;
use Livewire\Component;

class Sidebar extends Component
{
     public bool $sidebarOpen = false;
     public $pathName = "";
     public $isTruePath = "";

     public Function mount(Request $request) {

         $this -> pathName = $request -> path();

         if($request -> path() != 'dashboard/admin') $this -> isTruePath = explode("/", $request -> path())[2];

        // dd($this    -> isTruePath);
     }

    public function toggleSidebar(): void
    {
        $this->sidebarOpen = !$this->sidebarOpen;
    }

    public function closeSidebar(): void
    {
        $this->sidebarOpen = false;
    }
    public function render()
    {
        return view('livewire.admin.sidebar');
    }
}
