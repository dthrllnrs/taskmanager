<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Auth;

class LandingPage extends Component
{
    public $route = '#';

    public function mount() {
        if (Auth::check()) {
            $this->route = route('tasks');
        } else {
            $this->route = route('login');
        }
    }

    public function render()
    {
        return view('livewire.pages.landing-page');
    }
}
