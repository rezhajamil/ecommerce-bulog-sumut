<?php

namespace App\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $notif;

    public function render()
    {
        return view('livewire.navbar');
    }
}
