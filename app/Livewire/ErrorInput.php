<?php

namespace App\Livewire;

use Livewire\Component;

class ErrorInput extends Component
{
    public $field;

    public function render()
    {
        return view('livewire.error-input');
    }
}
