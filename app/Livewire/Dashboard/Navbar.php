<?php

namespace App\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $notif;

    public function mount()
    {
        $this->notif = Notification::where('user_id', Auth::user()->id)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.navbar');
    }
}
