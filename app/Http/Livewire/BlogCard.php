<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BlogCard extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.blog-card');
    }
}
