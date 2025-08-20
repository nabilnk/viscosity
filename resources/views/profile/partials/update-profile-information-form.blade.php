<section>
    <header>
        <h2 class="text-lg font-medium text-white">Profile Information</h2>
        <p class="mt-1 text-sm text-gray-400">Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            {{-- ... (logika verifikasi email jika ada) ... --}}
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>