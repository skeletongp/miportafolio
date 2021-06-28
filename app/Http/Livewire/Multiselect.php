<?php

namespace App\Http\Livewire;

use App\Models\Label;
use Livewire\Component;

class Multiselect extends Component
{
    public $object, $name, $input_id;
    protected $listeners=['render','render'];
    public function render()
    {
        $this->object=Label::all();
        return view('livewire.multiselect');
    }
}
