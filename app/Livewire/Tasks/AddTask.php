<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Auth;
use DB;

class AddTask extends Component
{
    public $showModal = false;
    public $isLoading = false;
    
    // input models
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('required|date')]
    public $due_date = '';

    public function handleSubmit() {
        $validated = $this->validate();
        DB::beginTransaction();
        try {
            $user = Auth::user();

            $task = $user->tasks()->create($validated);

            DB::commit();
            $this->showModal = false;
            $this->dispatch('refreshTasks', 'Tasks');
        } catch (\Exception $e) {
            DB::rollback();
            $this->addError('data', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.tasks.add-task');
    }
}
