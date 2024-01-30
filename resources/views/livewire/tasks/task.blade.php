<div class="task" x-data="{isCompleted: @entangle('isCompleted'), showPopOver: @entangle('showPopOver')}">
    <div class="bg-yellow p-5 rounded-md border border-white hover:border-gray-dark">
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-gray-dark truncate"> {{ $task->title }}</h3>
            <div class="relative">
                <button class="transition-all hover:scale-110" @click="showPopOver = !showPopOver">
                    <img class="h-6 text-gray-dark" src="{{ asset('svg/icons/elipsis.svg') }}" alt="" srcset="">
                </button>          
                <div x-show="showPopOver" 
                    @click.away="showPopOver = false" 
                    class="absolute top-full right-full w-40 bg-yellow
                        border-0 rounded-md p-2"
                >
                    <button x-on:click="$wire.showEditModal()"
                        class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray mb-1">
                        Edit
                    </button>
                    <button x-on:click="$wire.showDeleteConfirm()"
                        class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray">
                        Delete
                    </button>
                </div>            
            </div>
        </div>
        <div class="mb-10">
            <p class="text-gray-dark font-light break-words">{{ $task->description }}</p>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-light text-gray-dark select-none">
                Due Date: {{ $task->due_date }}
            </span>
            <div class="flex justify-end items-center">
                <div class="flex items-center">
                    <input
                        wire:model="isCompleted"
                        x-on:change="$wire.setStatus()"
                        type="checkbox"
                        id="doneMarker{{$task['id']}}"
                        class="form-checkbox h-4 w-4 
                            accent-gray bg-transparent mr-1 border rounded-md bg-transparent 
                            checked:border-transparent"
                        >
                    <label for="doneMarker{{$task['id']}}" class="text-gray-dark cursor-pointer select-none">Done</label>
                </div>
            </div>
        </div>                     
    </div>
</div>