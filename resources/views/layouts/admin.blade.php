<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Viscosity') }}</title>
        
        {{-- FONT LAMA (FIGTREE) --}}
        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        {{-- FONT BARU: MONTSERRAT DARI GOOGLE FONTS --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- 
        PERBAIKAN KUNCI: 
        1. relative di body, agar bisa menjadi "induk" untuk layer background.
        2. TIDAK ada style background di sini.
    --}}
    <body class="font-sans antialiased text-white bg-black relative">
        
        {{-- 
            LAYER KHUSUS UNTUK BACKGROUND
            - absolute inset-0 membuatnya seukuran <body> dan ikut scroll.
            - z-[-1] meletakkannya di LAPISAN PALING BELAKANG.
            - grayscale HANYA diterapkan pada layer ini, konten lain tidak terpengaruh.
        --}}
        {{-- <div 
            class="absolute inset-0 z-[-1] bg-cover bg-top bg-no-repeat grayscale" 
            style="background-image: url('{{ asset('assets/home/full-homepage-bg.png') }}');">
        </div> --}}

        {{-- KONTEN UTAMA YANG TAMPIL DI DEPAN BACKGROUND --}}
        <div class="relative z-10">
           @include('layouts.navigation') <!-- z-20 -->
<main class="relative z-10 pt-20">
    @yield('content')
</main>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>