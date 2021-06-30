<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalFotos extends Component
{
    public $open=false, $images;
    public function render()
    {
        return view('livewire.modal-fotos');
    }
    public function toggleModal()
    {
        $this->open=!$this->open;
    }
}
