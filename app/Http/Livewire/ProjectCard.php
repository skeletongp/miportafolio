<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectCard extends Component
{
    public $project;
    public function render()
    {
        return view('livewire.project-card');
    }
}
