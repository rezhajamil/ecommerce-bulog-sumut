<?php

namespace App\Livewire;

use App\Models\Notification as ModelsNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $notif;

    public function mount()
    {
        $this->notif = ModelsNotification::where('user_id', Auth::user()->id ?? "0")->get();
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
