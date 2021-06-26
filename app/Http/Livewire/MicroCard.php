<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MicroCard extends Component
{
    public $title, $level, $image, $color;
    public function render()
    {
        return view('livewire.micro-card');
    }
}
