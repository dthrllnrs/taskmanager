<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On; 
use Auth;

class Tasks extends Component
{
    public $tasks;
    public $filter = 'all';

    public function mount() {
        $this->refreshData();
    }

    #[On('refreshTasks')] 
    public function refreshData() {
        $user = Auth::user();
        $this->tasks = $user->tasks()->latest()->get();     
    }

    public function handleFilter($filter = 'all') {
        $user = Auth::user();
        $this->filter = $filter;
        if ($filter === 'pending' || $filter === 'completed') {
            $tasks = $user->tasks()->select('*')->where('status', $filter);
        } else if ($filter === 'due_today') {
            $tasks = $user->tasks()->select('*')->whereDate('due_date', date('Y-m-d'));
        } else {
            $tasks = $user->tasks();
        }
        $this->tasks = $tasks->latest()->get();
    }

    public function render()
    {
        return view('livewire.tasks.tasks');
    }
}
