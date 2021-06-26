<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tricard extends Component
{
    public $bigTitle, $bigImage, $title1, $title2, $title3, $image1, $image2, $image3, $icon1, $icon2, $icon3;
    public $link1="#",$link2="#",$link3="#";
    public function render()
    {
        return view('livewire.tricard');
    }
}
