<x-guest-layout>
    <div class="relative flex items-center justify-center min-h-screen overflow-hidden">

        {{-- Container Form --}}
        <div class="relative z-10 w-full max-w-md p-8">

            {{-- Judul "Reset Password" --}}
            <h2 class="text-center text-white text-2xl font-semibold uppercase mb-2 tracking-widest">Reset Password</h2>
            
            {{-- Keterangan --}}
            <p class="mb-4 text-sm text-gray-400 text-center">Masukkan password baru anda.</p>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf

                {{-- Token --}}
                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                {{-- Password --}}
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="peer placeholder-transparent h-10 w-full border-0 border-b border-gray-400 bg-transparent text-gray-100 
                            focus:outline-none focus:ring-0 focus:border-purple-400 pr-10"
                        placeholder="Password" />
                    <label for="password"
                        class="absolute left-0 -top-3.5 text-gray-300 text-sm font-bold 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-2 
                            transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">
                        Password
                    </label>
                    {{-- Icon Mata --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="togglePasswordConfirm" class="absolute right-0 top-2 w-5 h-5 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
                </div>

                {{-- Confirm Password --}}
                <div class="relative">
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="peer placeholder-transparent h-10 w-full border-0 border-b border-gray-400 bg-transparent text-gray-100 
                            focus:outline-none focus:ring-0 focus:border-purple-400 pr-10"
                        placeholder="Confirm Password" />
                    <label for="password_confirmation"
                        class="absolute left-0 -top-3.5 text-gray-300 text-sm font-bold 
                            peer-placeholder-shown:text-base peer-placeholder-shown:top-2 
                            transition-all peer-focus:-top-3.5 peer-focus:text-white peer-focus:text-sm">
                        Confirm Your Password
                    </label>
                    {{-- Icon Mata --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="togglePassword" class="absolute right-0 top-2 w-5 h-5 text-gray-400 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-400" />
                </div>

                {{-- Tombol Reset Password --}}
                <div>
                    <button
                        type="submit"
                        class="w-full py-2 px-4 rounded bg-gray-300 hover:bg-purple-600 text-black hover:text-white font-semibold transition"
                    >
                        Reset Password
                    </button>
                </div>

            </form>
        </div>
    </div>
    {{-- Script Toggle Password --}}
<script>
  function setupTogglePassword(toggleId, inputId) {
    const toggle = document.getElementById(toggleId);
    const input = document.getElementById(inputId);
    if (!toggle || !input) return;

    const iconOpen = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
      d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12c1.513 4.845 6.15 8.25 11.566 8.25
      1.65 0 3.225-.333 4.644-.937M21.066 15.777A10.477 10.477 0 0 0 22.066 12
      c-1.513-4.845-6.15-8.25-11.566-8.25-1.65 0-3.225.333-4.644.937M3 3l18 18"/>`;

    const iconClosed = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
      d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5
      c4.64 0 8.577 3.01 9.964 7.183.07.207.07.431 0 .639C20.577 16.49 16.64 19.5
      12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>`;

    // Toggle handler
    toggle.addEventListener('click', function () {
      const isHidden = input.type === 'password';
      input.type = isHidden ? 'text' : 'password';
      // swap icon paths inside the <svg>
      this.innerHTML = isHidden ? iconOpen : iconClosed;
    });
  }

  // **Perbaikan mapping sesuai HTML yang Anda kirim**
  setupTogglePassword('togglePasswordConfirm', 'password');            // svg id togglePasswordConfirm -> input id password
  setupTogglePassword('togglePassword', 'password_confirmation');      // svg id togglePassword -> input id password_confirmation
</script>

</x-guest-layout>
