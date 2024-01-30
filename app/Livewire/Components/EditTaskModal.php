<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Livewire\Tasks\Tasks;
use App\Models\Task;
use DB;

class EditTaskModal extends Component
{
    public $task;
    public $showModal = false, $isLoading = false;

    // input models
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $description = '';

    #[Validate('required|date')]
    public $due_date = '';

    protected $listeners = [
        'edit-task' => 'showEditModal',
    ];

    public function showEditModal(Task $task) {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->showModal = true;
    }

    public function handleSubmit() {
       // validate form inputs
        $validated = $this->validate();
        
        DB::beginTransaction();
        $this->isLoading = true;
        try {
            $this->task->update($validated);
            DB::commit();
            $this->dispatch('refresh-tasks')->to(Tasks::class);
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
        return view('livewire.components.edit-task-modal');
    }
}
