<div x-data="{ showModal: false }">
    <button @click="showModal = true" class="transition-all hover:scale-110">
        <img class="w-12 text-gray-dark" src="{{ asset('svg/icons/plus.svg') }}" alt="" srcset="">
    </button>                
    <div x-show="showModal" @click.self="showModal = false"
        class="fixed inset-0 bg-gray bg-opacity-50 flex items-center justify-center z-50">
        <!-- Modal content -->
        <div 
            class="bg-white p-8 rounded-xl shadow-lg w-full md:w-1/2" 
        >
            <div class="flex justify-between mb-5">
                <button class="font-light text-gray-dark transition-all hover:scale-110" @click="showModal = false">Cancel</button>
                <button class="py-2 px-5 rounded-lg text-white font-light bg-gray-dark hover:bg-gray mb-1">Add</button>
            </div>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-gray-dark text-sm font-bold mb-2">Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-2 rounded-md focus:outline-none text-gray-dark bg-gray bg-opacity-10" placeholder="add a title...">
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-dark text-sm font-bold mb-2">Title</label>
                    <textarea 
                        name="description"
                        id="description"
                        placeholder="add a description..."
                        rows="5"
                        class="w-full px-4 py-2 rounded-md focus:outline-none
                            text-gray-dark bg-gray bg-opacity-10"
                    ></textarea>
                </div>
                <div class="mb-4"
                    x-data
                    x-init="
                        flatpickr($refs.dateInput, {
                            altInput: true,
                            altFormat: 'F j, Y',
                            dateFormat: 'Y-m-d',
                            minDate: new Date()
                        })
                    "    
                >
                    <label for="duedate" class="block text-gray-dark text-sm font-bold mb-2">Due Date</label>
                    <input
                        x-ref="dateInput"
                        type="text"
                        id="duedate"
                        placeholder="YYYY-MM-DD"
                        class="w-full px-4 py-2 rounded-md focus:outline-none text-gray-dark bg-gray bg-opacity-10"                                    />                                
                </div>                            
            </form>
        </div>
    </div>
</div>