<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Auth;

class Tasks extends Component
{
    public $tasks;
    public $filter = 'all';

    protected $listeners = [
        'refresh-tasks' => 'handleFilter',
        'set-task-status' => 'setTaskStatus',
        'delete-task-confirm' => 'deleteTask',
    ];

    public function mount() {
        $user = Auth::user();
        $this->tasks = $user->tasks()->latest()->get();
    }

    public function handleFilter($filter = 'all') {
        $user = Auth::user();
        $this->filter = $filter;
        if ($filter === 'pending' || $filter === 'completed') {
            $tasks = $user->tasks()->where('status', $filter);
        } else if ($filter === 'due_today') {
            $tasks = $user->tasks()->whereDate('due_date', date('Y-m-d'));
        } else {
            $tasks = $user->tasks();
        }
        $this->tasks = $tasks->latest()->get();
    }

    public function setTaskStatus(Task $task, $status) {
        $key = $this->tasks->search(function ($item) use ($task) {
            return $item->id == $task->id;
        });

        if ($key !== false) {
            $this->tasks[$key] = $task;
        }        
    }

    public function deleteTask(Task $task) {
        $key = $this->tasks->search(function ($item) use ($task) {
            return $item->id == $task->id;
        });
        
        if ($key !== false) {
            $this->tasks->forget($key);
            $task->delete();
        }        
    }

    public function render()
    {
        return view('livewire.tasks.tasks');
    }
}
