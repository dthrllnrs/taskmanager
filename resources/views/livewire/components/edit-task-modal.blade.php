<div x-data="{ showModal: @entangle('showModal'), isLoading: @entangle('isLoading') }"
    x-show="showModal" x-on:click.self="showModal = false"
    class="fixed inset-0 bg-gray bg-opacity-50 flex items-center justify-center z-50 px-5">
    <!-- Modal content -->
    <div 
        class="bg-white p-8 rounded-xl shadow-lg w-full lg:w-1/2" 
    >
        <div class="flex justify-between mb-5">
            <button class="font-light text-gray-dark transition-all hover:scale-110" @click="showModal = false">Cancel</button>
            <button
                :disabled="isLoading"
                :class="{ 'opacity-50': isLoading }"                
                class="py-2 px-5 rounded-lg text-white font-light bg-gray-dark hover:bg-gray mb-1" 
                x-on:click="$wire.handleSubmit()"
            >
                <span x-show="!isLoading">Save</span>
                <span x-show="isLoading">
                    <svg class="animate-spin h-4 w-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v3m8 0v14M4 4v14m8-14L4 20m8-14l8 14"></path>
                    </svg>
                </span>       
            </button>
        </div>
        @if ($errors->has('data'))
            <div class="alert alert-danger">
                {{ $errors->first('data') }}
            </div>
        @endif          
        <form x-on:submit.prevent="$wire.handleSubmit()">
            <div class="mb-4">
                <label for="title" class="block text-gray-dark text-sm font-bold mb-2">Title</label>
                <input
                    wire:model.blur="title"
                    autofocus
                    type="text"
                    id="title"
                    name="title"
                    class="@error('title') border border-pink @enderror
                        w-full px-4 py-2 rounded-md focus:outline-none
                        text-gray-dark bg-gray bg-opacity-10"
                    placeholder="add a title..."
                >
                @error('title')
                    <span class="mt-3 text-pink font-medium">{{ $message }}</span>
                @enderror                    
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-dark text-sm font-bold mb-2">Description</label>
                <textarea 
                    wire:model.blur="description"
                    name="description"
                    id="description"
                    placeholder="add a description..."
                    rows="5"
                    class="@error('description') border border-pink @enderror
                        w-full px-4 py-2 rounded-md focus:outline-none
                        text-gray-dark bg-gray bg-opacity-10"
                ></textarea>
                @error('description')
                    <span class="mt-3 text-pink font-medium">{{ $message }}</span>
                @enderror                    
            </div>
            <div class="mb-4"
                x-data
                x-init="
                    flatpickr($refs.dateInput, {
                        enableTime: false,
                        dateFormat: 'Y-m-d',
                        minDate: new Date(),
                        onChange: function(dates, dateStr) {
                            @this.set('due_date', dateStr);
                        },
                    })
                "    
            >
                <label for="duedate" class="block text-gray-dark text-sm font-bold mb-2">Due Date</label>
                <input
                    wire:model="due_date"
                    x-ref="dateInput"
                    type="text"
                    id="duedate"
                    placeholder="YYYY-MM-DD"
                    class="@error('due_date') border border-pink @enderror
                        w-full px-4 py-2 rounded-md focus:outline-none
                        text-gray-dark bg-gray bg-opacity-10"                                    
                />
                @error('due_date')
                    <span class="mt-3 text-pink font-medium">{{ $message }}</span>
                @enderror                                               
            </div>
        </form>
    </div>
</div>