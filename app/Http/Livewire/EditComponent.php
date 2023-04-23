<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditComponent extends Component
{
    public $service;
    public $categories;
    public function render()
    {
        return view('livewire.edit-component');
    }
}
