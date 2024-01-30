<div class="p-4 lg:p-20 h-dvh">
    <header>
        <nav>
            <div class="flex justify-between items-center">
                <div class="flex justify-start items center gap-5">
                    <h1 class="text-2xl text-gray-dark">Task Manager</h1>
                    <livewire:components.logout-modal >
                </div>
                <livewire:tasks.add-task >
            </div>
        </nav>
    </header>
    <div class="flex justify-between h-full">
        <aside class="hidden lg:block w-1/6 py-8 h-full pr-3">
            <div class="flex flex-col justify-between items-between h-full" x-data="{ active: @entangle('filter') }">
                <div class="flex flex-col">
                    <button 
                        x-on:click="$wire.handleFilter('all')" 
                        :class="{'border border-gray rounded-md': active === 'all'}"
                        class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-3 py-2 pl-2"
                    >
                        <span class="rounded-full bg-blue block w-8 h-8 mr-2"></span>
                        All Tasks
                    </button>
                    <button
                        x-on:click="$wire.handleFilter('pending')"
                        :class="{'border border-gray rounded-md': active === 'pending'}"
                        class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-3 py-2 pl-2"
                    >
                        <span class="rounded-full bg-yellow block w-8 h-8 mr-2"></span>
                        Pending
                    </button>
                    <button
                        x-on:click="$wire.handleFilter('completed')"
                        :class="{'border border-gray rounded-md': active === 'completed'}"
                        class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-3 py-2 pl-2"
                    >
                        <span class="rounded-full bg-green block w-8 h-8 mr-2"></span>
                        Completed
                    </button>
                    <button
                        x-on:click="$wire.handleFilter('due_today')"
                        :class="{'border border-gray rounded-md': active === 'due_today'}"
                        class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-3 py-2 pl-2"
                    >
                        <span class="rounded-full bg-pink block w-8 h-8 mr-2"></span>
                        Due Today
                    </button>                                    
                </div>
                <div>
                    <img class="w-1/2 mb-7" src="{{ asset('svg/choice_pending.svg') }}" alt="" srcset="">
                    <button x-on:click="$wire.$dispatch('show-logout-modal')" class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <img class="w-10 text-gray-dark" src="{{ asset('svg/icons/exit.svg') }}" alt="" srcset="">
                        Logout    
                    </button>                    
                </div>
            </div>
        </aside>
        <main class="w-screen lg:w-5/6 py-8 overflow-y-auto">
            <div class="flex justify-around p-2 w-full lg:hidden flex-wrap" x-data="{ active: @entangle('filter') }">
                <button 
                    x-on:click="$wire.handleFilter('all')" 
                    :class="{'border border-gray rounded-md': active === 'all'}"
                    class="min-w-max transition-all text-gray-dark flex justify-start items-center mb-3 py-2 px-4"
                >
                    <span class="rounded-full bg-blue block w-8 h-8 mr-2"></span>
                    All Tasks
                </button>
                <button
                    x-on:click="$wire.handleFilter('pending')"
                    :class="{'border border-gray rounded-md': active === 'pending'}"
                    class="min-w-max transition-all text-gray-dark flex justify-start items-center mb-3 py-2 px-4"
                >
                    <span class="rounded-full bg-yellow block w-8 h-8 mr-2"></span>
                    Pending
                </button>
                <button
                    x-on:click="$wire.handleFilter('completed')"
                    :class="{'border border-gray rounded-md': active === 'completed'}"
                    class="min-w-max transition-all text-gray-dark flex justify-start items-center mb-3 py-2 px-4"
                >
                    <span class="rounded-full bg-green block w-8 h-8 mr-2"></span>
                    Completed
                </button>
                <button
                    x-on:click="$wire.handleFilter('due_today')"
                    :class="{'border border-gray rounded-md': active === 'due_today'}"
                    class="min-w-max transition-all text-gray-dark flex justify-start items-center mb-3 py-2 px-4"
                >
                    <span class="rounded-full bg-pink block w-8 h-8 mr-2"></span>
                    Due Today
                </button>                                    
            </div>            
            @if ($tasks->count())
                <div class="tasklist">
                    @foreach ($tasks as $task)
                        <livewire:tasks.task :$task wire:key="{{ $task->id }}" />
                    @endforeach
                </div>
            @else
                <div class="w-full h-full flex justify-center items-center px-5">
                    <div class="w-full lg:w-1/3 flex flex-col justify-start align-center flex-wrap">
                        <img class="h-48 mb-5" src="{{ asset('svg/empty_result.svg') }}" alt="" srcset="">
                        <p class="mb-5 text-gray-dark font-light text-center">No tasks to show</p>
                    </div>
                </div>
            @endif
        </main>
    </div>
</div>
