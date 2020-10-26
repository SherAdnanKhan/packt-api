<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Docs extends Component
{
    public $expanded;

    public function render()
    {
        return view('livewire.docs');
    }

    public function expandView()
    {
        $this->expanded = true;
    }

}
