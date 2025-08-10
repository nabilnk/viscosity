<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Viscosity') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="font-sans antialiased text-gray-900">
    {{-- background foto + layer gelap --}}
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('assets/auth/login-bg.png') }}" class="w-full h-full object-cover object-center grayscale" />
        {{-- 
            TAMBAHKAN LAYER HITAM SEMI-TRANSPARAN DI SINI
            `bg-black/50` berarti warna hitam dengan opasitas 50%
        --}}
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    {{ $slot }}
</body>
</html>