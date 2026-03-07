<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
      public $title = "";
    /**
     * Create a new component instance.
     */
    public function __construct($title = "")
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
