<div x-data="{showModal: @entangle('showModal')}" x-show="showModal" x-on:click.self="showModal = false"
    class="fixed inset-0 bg-gray bg-opacity-50 flex items-center justify-center z-50 px-5">
    <!-- Modal content -->
    <div 
        class="bg-white p-8 rounded-xl shadow-lg w-full md:w-1/2 lg:w-1/4" 
    >
        <p class="text-gray-dark font-light mb-5">Are you sure you want to delete @isset($task)<span class="font-medium">{{ $task->title }}</span>@endisset?</p>
        <div class="flex justify-center items-center gap-2">
            <button x-on:click="showModal = false" class="bg-gray-dark hover:bg-gray text-white font-light py-3 px-4 rounded-lg">Cancel</button>
            <button x-on:click="$wire.handleConfirm()" class="bg-gray-dark hover:bg-gray text-white font-light py-3 px-4 rounded-lg">Delete</button>
        </div>
    </div>
</div>
