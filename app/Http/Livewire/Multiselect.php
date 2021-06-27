<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Multiselect extends Component
{
    public $object, $name, $input_id;
    public function render()
    {
        return view('livewire.multiselect');
    }
}
