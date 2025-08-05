<nav x-data="{ open: false }" class="fixed w-full z-50">
    <div class="bg-gradient-to-b from-zinc-800 to-zinc-900/80 backdrop-blur-sm border-b border-zinc-700/50">
        <div class="w-full  px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                {{-- 1. LOGO (Tetap di Kiri) --}}
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/logo/logo-v-white.png') }}" class="block h-14 w-auto" alt="Viscosity Logo">
                    </a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-auto">
                    {{-- MENU UTAMA --}}
                <div class="flex space-x-6">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-purple-400' : 'text-gray-400 hover:text-white' }}">HOME</a>
                    
                
                    <div x-data="{ open: false }" @mouseleave="open = false" class="relative">
                        <button @mouseover="open = true" class="flex items-center px-3 py-2 rounded-md text-sm font-medium transition-colors
                            {{ request()->routeIs('event.*') ? 'text-purple-400' : 'text-gray-400 hover:text-white' }}">
                            <span>EVENT</span>
                            <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        {{-- Dropdown Panel --}}
                        <div x-show="open" 
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-zinc-800 ring-1 ring-black ring-opacity-5"
                                style="display: none;">
                            <div class="py-1">
                                <a href="{{ route('event.monthly') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-zinc-700">MONTHLY</a>
                                <a href="{{ route('event.exclusive') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-zinc-700">EXCLUSIVE</a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('talent') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('talent') ? 'text-purple-400' : 'text-gray-400 hover:text-white' }}">TALENT</a>
                    <a href="{{ route('vvip') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('vvip') ? 'text-purple-400' : 'text-gray-400 hover:text-white' }}">VVIP</a>
                    <a href="{{ route('nofreq') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('nofreq') ? 'text-purple-400' : 'text-gray-400 hover:text-white' }}">NOFREQ</a>
                </div>

                    
                    {{-- TOMBOL LOGIN/AUTH --}}
                    <div class="ml-8 flex items-center">
                        @auth
                            {{-- Dropdown saat login --}}
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none">
                                        <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}"><@csrf<x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link></form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            {{-- Hanya Tombol Login --}}
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-400 hover:text-white">Login</a>
                        @endauth
                    </div>
                </div>

                {{-- Hamburger Menu untuk Mobile (tetap terpisah dan paling kanan) --}}
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none">
                        <svg :class="{'hidden': open, 'block': ! open }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        <svg :class="{'hidden': ! open, 'block': open }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</nav>