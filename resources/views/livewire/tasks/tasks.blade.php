<div class="p-4 md:p-20 h-dvh">
    <header>
        <nav>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl text-gray-dark">Task Manager</h1>
                @livewire('tasks.add-task')
            </div>
        </nav>
    </header>
    <div class="flex justify-between h-full">
        <aside class="hidden md:block w-1/6 py-8 h-full">
            <div class="flex flex-col justify-between items-between h-full">
                <div class="flex flex-col">
                    <button class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <span class="rounded-full bg-blue block w-8 h-8 mr-2"></span>
                        All Tasks
                    </button>
                    <button class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <span class="rounded-full bg-yellow block w-8 h-8 mr-2"></span>
                        Pending
                    </button>
                    <button class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <span class="rounded-full bg-green block w-8 h-8 mr-2"></span>
                        Completed
                    </button>
                    <button class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <span class="rounded-full bg-pink block w-8 h-8 mr-2"></span>
                        Due Today
                    </button>                                    
                </div>
                <div>
                    <img class="w-1/2 mb-7" src="{{ asset('svg/choice_pending.svg') }}" alt="" srcset="">
                    <button class="transition-all hover:scale-110 text-gray-dark flex justify-start items-center mb-7">
                        <img class="w-10 text-gray-dark" src="{{ asset('svg/icons/exit.svg') }}" alt="" srcset="">
                        Logout    
                    </button>                    
                </div>
            </div>
        </aside>
        <main class="w-screen md:w-5/6 py-8 overflow-y-auto">
            <div class="tasklist">
                <div class="task">
                    <div class="bg-yellow p-5 rounded-md">
                        <div class="flex justify-between items-center mb-5">
                            <h3 class="text-gray-dark">First Task</h3>
                            <div class="relative" x-data="{ showPopOver : false }">
                                <button class="transition-all hover:scale-110" @click="showPopOver = !showPopOver">
                                    <img class="h-6 text-gray-dark" src="{{ asset('svg/icons/elipsis.svg') }}" alt="" srcset="">
                                </button>          
                                <div x-show="showPopOver" 
                                    @click.away="showPopOver = false" 
                                    class="absolute top-full right-full w-40 bg-yellow
                                        border-0 rounded-md p-2"
                                >
                                    <button class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray mb-1">Edit</button>
                                    <button class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray">Delete</button>
                                </div>            
                            </div>
                        </div>
                        <div class="mb-10">
                            <p class="text-gray-dark font-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing 
                                elit. Nisi consequuntur voluptate repellat alias impedit 
                                veniam nostrum dolore numquam quos perferendis assumenda veritatis
                            </p>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-light text-gray-dark">
                                Due Date: Jan, 29 2024
                            </span>
                            <div class="flex justify-end items-center">
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox"
                                        id="doneMarker1"
                                        class="form-checkbox h-4 w-4 
                                            accent-gray bg-transparent mr-1 border rounded-md bg-transparent 
                                            checked:border-transparent"
                                        >
                                    <label for="doneMarker1" class="text-gray-dark cursor-pointer">Done</label>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>
                <div class="task">
                    <div class="bg-yellow p-5 rounded-md">
                        <div class="flex justify-between items-center mb-5">
                            <h3 class="text-gray-dark">Second Task</h3>
                            <div class="relative" x-data="{ showPopOver : false }">
                                <button class="transition-all hover:scale-110" @click="showPopOver = !showPopOver">
                                    <img class="h-6 text-gray-dark" src="{{ asset('svg/icons/elipsis.svg') }}" alt="" srcset="">
                                </button>          
                                <div x-show="showPopOver" 
                                    @click.away="showPopOver = false" 
                                    class="absolute top-full right-full w-40 bg-yellow
                                        border-0 rounded-md p-2"
                                >
                                    <button class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray mb-1">Edit</button>
                                    <button class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray">Delete</button>
                                </div>            
                            </div>
                        </div>
                        <div class="mb-10">
                            <p class="text-gray-dark font-light">
                                Lorem ipsum dolor sit amet consectetur, adipisicing 
                                elit. Nisi consequuntur voluptate repellat alias impedit 
                                veniam nostrum dolore numquam quos perferendis assumenda veritatis 
                                architecto laborum saepe necessitatibus dicta iusto rem ab dolor illo 
                                laboriosam nesciunt, ut sit deleniti. Nisi, asperiores incidunt.
                            </p>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-light text-gray-dark">
                                Due Date: Jan, 29 2024
                            </span>
                            <div class="flex justify-end items-center">
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox"
                                        id="doneMarker2"
                                        class="form-checkbox h-4 w-4 
                                            accent-gray bg-transparent mr-1 border rounded-md bg-transparent 
                                            checked:border-transparent"
                                        >
                                    <label for="doneMarker2" class="text-gray-dark cursor-pointer">Done</label>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </div>             
            </div>
        </main>

    </div>
</div>
