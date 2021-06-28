<?php

namespace App\Http\Livewire;

use App\Models\Label;
use Livewire\Component;

class NewLabel extends Component
{
    public $open=false;
    public $title, $meta;
    public function render()
    {
        return view('livewire.new-label');
    }
    public function toggleModal()
    {
        $this->open=!$this->open;
    }
    protected $rules=[
        'title'=>'required',
        'meta'=>'required',
    ];
    public function save_label()
    {
        $this->validate();
        $label= new Label();
        $label->title=$this->title;
        $label->meta=$this->meta;
        if($label->save()){
            $this->open=false;
        }
        $this->emitTo('multiselect','render');
    }
}
