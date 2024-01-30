<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class Task extends Component
{
    #[Reactive]
    public $task;
    public $isCompleted, $taskId, $showPopOver = false;

    public function mount($task) {
        $this->task = $task;
        $this->isCompleted = $task->status === 'completed';
        $this->showEditModal = false;
    }

    public function setStatus() {
        $this->task->status = $this->isCompleted ? 'completed' : 'pending';
        $this->task->save();
    }

    public function showDeleteConfirm() {
        $this->showPopOver = false;
        $this->dispatch('delete-task', [$this->task->id]);
    }

    public function showEditModal() {
        $this->showPopOver = false;
        $this->dispatch('edit-task', [$this->task->id]);
    }

    public function render()
    {
        return view('livewire.tasks.task');
    }
}
