<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\Attributes\Reactive;
use Livewire\Attributes\On;
use App\Models\Task as TaskModel;

class Task extends Component
{
    public $task;
    
    public $isCompleted, $showPopOver = false;

    public function mount($task) {
        $this->task = $task;
        $this->isCompleted = $task->status === 'completed';
    }

    public function setStatus() {
        $status = $this->isCompleted ? 'completed' : 'pending';
        $taskId = $this->task->id;
        $this->task->status = $status;
        $this->task->save();
        $this->dispatch('set-task-status', $taskId, $status);
    }

    public function showDeleteConfirm() {
        $this->showPopOver = false;
        $this->dispatch('delete-task', $this->task->id);
    }

    public function showEditModal() {
        $this->showPopOver = false;
        $this->dispatch('edit-task', $this->task->id);
    }

    #[On('task-modified.{task.id}')] 
    public function taskModified($taskId) {
        $this->task = TaskModel::find($taskId);
    }

    public function render()
    {
        return view('livewire.tasks.task');
    }
}
