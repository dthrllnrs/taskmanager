<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Auth;

class LogoutModal extends Component
{
    public $showPopOver = false, $showModal = false;

    protected $listeners = [
        'show-logout-modal' => 'showModal',
    ];

    public function render()
    {
        return view('livewire.components.logout-modal');
    }

    public function showModal() {
        $this->showModal = true;
    }

    public function handleConfirm() {
        Auth::logout();

        return redirect()->route('login');
    }
}
