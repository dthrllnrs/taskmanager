<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;
use Auth;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function login() {
        $validated = $this->validate();

        if (Auth::attempt($validated)) {
            return redirect()->route('tasks');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}
