<x-app-layout>
    <div class="pt-24 pb-16 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Profile Information -->
            <div class="p-4 sm:p-8 bg-gray-800/50 border border-gray-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-gray-800/50 border border-gray-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-4 sm:p-8 bg-gray-800/50 border border-gray-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>