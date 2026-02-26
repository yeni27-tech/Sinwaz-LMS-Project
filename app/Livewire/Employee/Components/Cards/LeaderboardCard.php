<?php

namespace App\Livewire\Employee\Components\Cards;

use Livewire\Component;

class LeaderboardCard extends Component
{
    public $name;
    public $total_score;
    public $rank;
    public function mount($name,$total_score,$rank) {
        $this->name = $name;
        $this->total_score = $total_score;
        $this->rank = $rank;
    }
    public function render()
    {
        return view('livewire.employee.components.cards.leaderboard-card');
    }
}
