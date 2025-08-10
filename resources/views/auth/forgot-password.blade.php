<x-guest-layout>
    <div class="relative flex items-center justify-center min-h-screen overflow-hidden">

        {{-- Container Form --}}
        <div class="relative z-10 w-full max-w-md p-8">

            {{-- Judul "Forgot Password" --}}
            <h2 class="text-center text-white text-2xl font-semibold uppercase mb-2 tracking-widest">Forgot Password</h2>

            {{-- Deskripsi  DIPERBAIKI --}}
            <p class="mb-4 text-sm text-gray-400 text-center">
                {{ __('Masukkan email terdaftar Anda untuk memulihkan password') }}
            </p>

            {{-- Alert untuk status --}}
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

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

                {{-- Tombol --}}
                <div>
                    <button
                        type="submit"
                        class="w-full py-2 px-4 rounded bg-gray-300 hover:bg-purple-600 text-black hover:text-white font-semibold transition"
                    >
                        SEND EMAIL
                    </button>
                </div>

                {{-- Back to Login --}}
                <div class="text-left mt-4 text-sm text-white">
                    Kembali ke
                    <a href="{{ route('login') }}" class="underline hover:text-purple-400">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>