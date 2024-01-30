<div x-data="{showPopOver: @entangle('showPopOver'), showModal: @entangle('showModal')}">
    <div class="relative lg:hidden flex items-center">
        <button class="transition-all hover:scale-110 rounded-md border p-1 border-gray-dark" x-on:click="showPopOver = !showPopOver">
            <img class="h-6 text-gray-dark" src="{{ asset('svg/icons/menu.svg') }}" alt="" srcset="">
        </button>          
        <div x-show="showPopOver" 
            @click.away="showPopOver = false" 
            class="absolute top-full right-1/2 w-40 bg-transparent
                border-0 rounded-md p-2"
        >
            <button x-on:click="showModal = true"
                class="w-full p-2 rounded-md text-white font-light bg-gray-dark hover:bg-gray flex justify-start items-center">
                <img class="w-8 text-white" src="{{ asset('svg/icons/exit_white.svg') }}" alt="" srcset="">
                Logout
            </button>
        </div>
    </div>
    <div x-show="showModal" x-on:click.self="showModal = false"
        class="fixed inset-0 bg-gray bg-opacity-50 flex items-center justify-center z-50 px-5">
        <!-- Modal content -->
        <div 
            class="bg-white p-8 rounded-xl shadow-lg w-full md:w-1/2 lg:w-1/4" 
        >
            <p class="text-gray-dark font-light mb-5">Are you sure you want to logout?</p>
            <div class="flex justify-center items-center gap-2">
                <button x-on:click="showModal = false" class="bg-gray-dark hover:bg-gray text-white font-light py-3 px-4 rounded-lg">Cancel</button>
                <button x-on:click="$wire.handleConfirm()" class="bg-gray-dark hover:bg-gray text-white font-light py-3 px-4 rounded-lg">Confirm</button>
            </div>
        </div>
    </div>
</div>