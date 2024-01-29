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
        // validate form inputs
        $validated = $this->validate();
        
        DB::beginTransaction();
        $this->isLoading = true;
        try {
            $user = Auth::user();

            $task = $user->tasks()->create($validated);

            DB::commit();
            $this->dispatch('refresh-tasks', 'all');
            $this->clearForm();
            $this->showModal = false;
        } catch (\Exception $e) {
            DB::rollback();
            $this->addError('data', $e->getMessage());
        } finally {
            $this->isLoading = false;
        }
    }

    public function clearForm() {
        $this->reset('title');
        $this->reset('description');
        $this->reset('due_date');
    }

    public function render()
    {
        return view('livewire.tasks.add-task');
    }
}
