<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Banner extends Component
{
    public $titulo, $cuerpo;
    public function render()
    {
        return view('livewire.banner');
    }
}
