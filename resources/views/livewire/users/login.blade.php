<div class="flex justify-center items-center min-h-screen">
    <main class="lg:w-1/3">
        <section class="illustration-section flex justify-center">
            <img class="h-48" src="{{ asset('svg/auth.svg') }}" alt="" srcset="">
        </section>
        <section class="intro-section mb-5 px-4 lg:px-0">
            <h1 class="text-3xl mb-5 text-gray-dark text-center">Task Manager</h1>
            <p class="mb-5 text-gray-dark font-light text-center">Login to Task Manager to view and manage your tasks</p>
            <form wire:submit.prevent="login">
                <div class="mb-4">
                    <label for="email" class="block text-gray-dark text-sm font-bold mb-2">Email</label>
                    <input type="email"
                        id="email"
                        name="email"
                        wire:model.blur="email"
                        class="@error('email') border border-pink @enderror
                            w-full px-4 py-2 rounded-md focus:outline-none
                            text-gray-dark bg-gray bg-opacity-10" 
                        placeholder="input email..."
                    >
                    @error('email')
                        <span class="mt-3 text-pink font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="password" class="block text-gray-dark text-sm font-bold mb-2">Password</label>
                    <input type="password"
                        id="password"
                        name="password"
                        wire:model.blur="password"
                        class="@error('password') border border-pink @enderror
                            w-full px-4 py-2 rounded-md focus:outline-none
                            text-gray-dark bg-gray bg-opacity-10"
                        placeholder="input password..."
                    >
                    @error('password')
                        <span class="mt-3 text-pink font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-gray-dark hover:bg-gray text-white font-light py-2 px-4 rounded-lg mb-5">
                    Login
                </button>
                <span class="text-gray-dark font-light w-full text-center block">New to Task Manager? 
                    <a href="{{ route('register') }}" class="text-gray-dark no-underline font-medium">Register now!</a>
                </span>
            </form>
        </section>
    </main>
</div>
