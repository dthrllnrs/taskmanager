<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Task;

class DeleteConfirmationModal extends Component
{
    public $task;
    public $showModal = false;

    protected $listeners = [
        'delete-task' => 'showConfirmationModal',
    ];

    public function showConfirmationModal(Task $task) {
        $this->task = $task;
        $this->showModal = true;
    }

    public function handleConfirm() {
        $this->task->delete();
        $this->showModal = false;
        $this->dispatch('refresh-tasks', 'all');
    }

    public function render()
    {
        return view('livewire.components.delete-confirmation-modal');
    }
}
