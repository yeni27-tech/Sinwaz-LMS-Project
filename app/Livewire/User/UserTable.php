<?php

namespace App\Livewire\Components\User;

use Livewire\Component;

class User extends Component
{
    public function placeholder()
    {
        return view('components.loading');
    }

    public function render()
    {
        return view('livewire.components.tables.user');
    }
}
