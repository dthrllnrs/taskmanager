<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use App\Models\User;
use Auth;
use DB;

class Register extends Component
{
    #[Validate('required')]
    public $name;

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public $isLoading = false;

    public function register() {
        try {
            $this->validate();

            $this->isLoading = true;
            DB::beginTransaction();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('tasks');
        } catch (\Exception $e) {
            DB::rollback();
            $this->addError('data', $e->getMessage());
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        return view('livewire.users.register');
    }
}
