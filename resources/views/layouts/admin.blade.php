<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        sidebarOpen: true,
        darkMode: JSON.parse(localStorage.getItem('dark') ?? 'true'),
    }"
    x-init="$watch('darkMode', v => localStorage.setItem('dark', JSON.stringify(v)))"
    :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Viscosity') }} — Admin</title>

    {{-- Tailwind (Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- AlpineJS v3 --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Icons (Heroicons via SVG inline di bawah) --}}
    <style>[x-cloak]{ display:none!important; }</style>
</head>

<body class="antialiased bg-slate-50 text-slate-900 dark:bg-slate-900 dark:text-slate-100">
<div class="min-h-screen flex">

    {{-- ============= SIDEBAR ============= --}}
    <aside
        class="w-72 shrink-0 border-r border-slate-200 bg-white/90 backdrop-blur
               dark:bg-slate-800/80 dark:border-slate-700
               transition-transform duration-300"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    >
        {{-- Brand --}}
        <div class="h-16 flex items-center gap-3 px-5 border-b border-slate-200 dark:border-slate-700">
            <img src="{{ asset('assets/logo/viscosity-text.png') }}" class="h-6" alt="Viscosity">
            <div class="ms-auto lg:hidden">
                <button @click="sidebarOpen=false" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                    {{-- X icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="p-4 space-y-6">
            {{-- Group: Dashboard --}}
            <div>
                <p class="px-2 text-xs font-semibold uppercase tracking-wider text-slate-400">Menu</p>
                <ul class="mt-2 space-y-1">
                    <li>
                        <a href="{{ route('admin.index') }}"
                           class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm
                                  hover:bg-slate-100 dark:hover:bg-slate-700
                                  {{ request()->routeIs('admin.index') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">
                            {{-- Home icon --}}
                            <svg class="h-5 w-5 opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 9.75L12 3l9 6.75M4.5 10.5V21h15V10.5"/></svg>
                            Dashboard
                        </a>
                    </li>

                    {{-- Collapsible: Admin Panel --}}
                    <li x-data="{ open:false }">
                        <button @click="open=!open"
                                class="w-full flex items-center justify-between rounded-xl px-3 py-2.5 text-sm hover:bg-slate-100 dark:hover:bg-slate-700">
                            <span class="flex items-center gap-3">
                                <svg class="h-5 w-5 opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                Admin Panel
                            </span>
                            <svg :class="open ? 'rotate-180' : ''" class="h-4 w-4 transition-transform"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.106l3.71-3.875a.75.75 0 111.08 1.04l-4.24 4.43a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul x-show="open" x-cloak x-transition
                            class="mt-1 ms-9 space-y-1 border-s-l border-slate-200 dark:border-slate-700 ps-3">
                            <li><a href="{{ route('admin.assets.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.assets.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">Asset Home</a></li>
                            <li><a href="{{ route('admin.events.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.events.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">Events</a></li>
                            <li><a href="{{ route('admin.talents.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.talents.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">Talents</a></li>
                            <li><a href="{{ route('admin.nofreqs.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.nofreqs.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">NOFREQ</a></li>
                            <li><a href="{{ route('admin.tickets.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.tickets.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">Ticketing</a></li>
                            <li><a href="{{ route('admin.vvip.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.vvip.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">VVIP</a></li>
                            <li><a href="{{ route('admin.users.index') }}"
                                   class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 {{ request()->routeIs('admin.users.*') ? 'bg-slate-100 dark:bg-slate-700/70 font-semibold' : '' }}">Kelola Pengguna</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            {{-- Support / Back --}}
            <div class="pt-2">
                <a href="{{ route('home') }}"
                   class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                    Kembali ke Halaman Depan
                </a>
            </div>
        </nav>
    </aside>

    {{-- ============= MAIN ============= --}}
    <div class="flex-1 flex min-w-0 flex-col">

        {{-- Topbar --}}
        <header class="h-16 sticky top-0 z-30 border-b border-slate-200 bg-white/70 backdrop-blur
                       dark:bg-slate-800/70 dark:border-slate-700">
            <div class="h-full px-4 sm:px-6 lg:px-8 flex items-center gap-3">
                <button class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700"
                        @click="sidebarOpen = !sidebarOpen" aria-label="Toggle sidebar">
                    {{-- Hamburger --}}
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                {{-- Search --}}
                <div class="relative hidden md:block w-80">
                    <input type="text" placeholder="Search…"
                           class="w-full rounded-xl border border-slate-200/80 bg-white px-3 py-2 pl-9 text-sm
                                  placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500
                                  dark:bg-slate-900 dark:border-slate-700">
                    <svg class="absolute left-3 top-2.5 h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="m21 21-4.35-4.35M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16z"/></svg>
                </div>

                <div class="ml-auto flex items-center gap-2">
                    {{-- Theme toggle --}}
                    <button @click="darkMode = !darkMode"
                            class="p-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-100
                                   dark:border-slate-700 dark:bg-slate-900 dark:hover:bg-slate-800">
                        <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3.25a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0V4a.75.75 0 0 1 .75-.75ZM5.47 5.47a.75.75 0 0 1 1.06 0l1.06 1.06a.75.75 0 1 1-1.06 1.06L5.47 6.53a.75.75 0 0 1 0-1.06ZM3.25 12a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H4a.75.75 0 0 1-.75-.75Zm9 8.75a.75.75 0 0 1-.75-.75v-1.5a.75.75 0 0 1 1.5 0V20a.75.75 0 0 1-.75.75ZM18.53 5.47a.75.75 0 0 1 0 1.06l-1.06 1.06a.75.75 0 0 1-1.06-1.06l1.06-1.06a.75.75 0 0 1 1.06 0ZM20.75 12a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5H20a.75.75 0 0 1 .75.75ZM8.28 17.47a.75.75 0 0 1 1.06 0l1.06 1.06a.75.75 0 1 1-1.06 1.06L8.28 18.53a.75.75 0 0 1 0-1.06Zm7.32 0a.75.75 0 0 1 0 1.06l-1.06 1.06a.75.75 0 1 1-1.06-1.06l1.06-1.06a.75.75 0 0 1 1.06 0Z"/></svg>
                        <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/></svg>
                    </button>

                    {{-- User / Logout --}}
                    <div class="relative" x-data="{open:false}">
                        <button @click="open=!open"
                                class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-2.5 py-1.5 text-sm
                                       hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:hover:bg-slate-800">
                            <span class="hidden sm:block">Hi, {{ Auth::user()->name ?? 'Admin' }}</span>
                            <img class="h-7 w-7 rounded-full object-cover" src="https://i.pravatar.cc/100?img=12" alt="avatar">
                        </button>
                        <div x-show="open" x-cloak @click.outside="open=false"
                             class="absolute right-0 mt-2 w-48 rounded-xl border border-slate-200 bg-white p-1 shadow-lg
                                    dark:border-slate-700 dark:bg-slate-900">
                            <a href="{{ route('profile.edit') ?? '#' }}" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-800">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left rounded-lg px-3 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Content --}}
        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-200 bg-white/70 backdrop-blur py-4 text-center text-sm
                       dark:bg-slate-800/70 dark:border-slate-700">
            © {{ date('Y') }} Viscosity. All rights reserved.
        </footer>
    </div>
</div>
</body>
</html>
