<x-guest-layout>
    <div class="relative flex items-center justify-center min-h-screen overflow-hidden">
        {{-- Container --}}
        <div class="relative z-10 w-full max-w-xs p-2">
            {{-- Title --}}
            <h2 class="text-center text-white text-2xl font-semibold uppercase mb-8 tracking-widest">REGISTER</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Username --}}
                <div class="relative">
                    <input id="username" name="username" type="text" required
                        class="peer placeholder-transparent h-10 w-full border-0 border-b border-gray-400 bg-transparent text-gray-100 
                            focus:outline-none focus:ring-0 focus:border-purple-400"
                        placeholder="Username" />
                    <label for="username"
                        class="absolute left-0 -top-3.5 text-gray-300 text-sm font-bold 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-2 
                            transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">
                        Username
                    </label>
                    {{-- Icon Profile di kanan --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-0 top-2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 7.5a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a8.25 8.25 0 1 1 15 0v.75H4.5v-.75Z" />
                    </svg>
                    <x-input-error :messages="$errors->get('username')" class="mt-2 text-xs text-red-400" />
                </div>

                {{-- Password --}}
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="peer placeholder-transparent h-10 w-full border-0 border-b border-gray-400 bg-transparent text-gray-100 
                            focus:outline-none focus:ring-0 focus:border-purple-400"
                        placeholder="Password" />
                    <label for="password"
                        class="absolute left-0 -top-3.5 text-gray-300 text-sm font-bold 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-2 
                            transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">
                        Password
                    </label>
                    {{-- Icon Mata di kanan --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="togglePassword" class="absolute right-0 top-2 w-5 h-5 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
                </div>

                {{-- Email --}}
                <div class="relative">
                    <input id="email" 
                    name="email" 
                    type="email" required
                    class="peer placeholder-transparent h-10 w-full border-0 border-b border-gray-400 bg-transparent text-gray-100 
                            focus:outline-none focus:ring-0 focus:border-purple-400"
                    placeholder="email" />
                    <label for="email"
                        class="absolute left-0 -top-3.5 text-gray-300 text-sm font-bold 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-2 
                            transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">
                        Email
                    </label>
                        {{-- Icon Mail --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-2 w-5 h-5 text-gray-300 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3V8h18z" />
                    </svg>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
                </div>

                {{-- Register Button --}}
                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 rounded bg-gray-300 hover:bg-purple-600 text-black hover:text-white font-semibold transition">
                        {{ __('REGISTER') }}
                    </button>
                </div>

                {{-- Login Link --}}
                <div class="text-center mt-4 text-sm text-white">
                    Sudah Punya Akun?
                    <a href="{{ route('login') }}" class="underline hover:text-purple-400">
                        Login Disini!
                    </a>
                </div>
            </form>
        </div>
    </div>

        {{-- Script untuk toggle password --}}
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const pass = document.getElementById('password');
            if (pass.type === 'password') {
                pass.type = 'text';
                this.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12c1.513 4.845 6.15 8.25 11.566 8.25 1.65 0 3.225-.333 4.644-.937M21.066 15.777A10.477 10.477 0 0 0 22.066 12c-1.513-4.845-6.15-8.25-11.566-8.25-1.65 0-3.225.333-4.644.937M3 3l18 18"/>`;
            } else {
                pass.type = 'password';
                this.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
            }
        });
    </script>
</x-guest-layout>
