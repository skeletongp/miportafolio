<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Carrusel extends Component
{   
    public $object;
    public function render()
    {
        return view('livewire.carrusel');
    }
}
