<?php

namespace App\Livewire\Employee\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public bool $sidebarOpen = false;

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
        return view('livewire.employee.components.sidebar');
    }
}
