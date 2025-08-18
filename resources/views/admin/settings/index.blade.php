@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Pengaturan Halaman</h1>

    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Toggle untuk Event Exclusive -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-white">Halaman Event Exclusive</h3>
                <p class="text-sm text-gray-400">
                    @if($isExclusiveComingSoon)
                        Status saat ini: <span class="font-semibold text-yellow-400">COMING SOON</span>. Pengunjung tidak bisa melihat daftar event.
                    @else
                        Status saat ini: <span class="font-semibold text-green-400">AKTIF</span>. Pengunjung bisa melihat dan membeli tiket.
                    @endif
                </p>
            </div>
            
            <form action="{{ route('admin.settings.toggleExclusive') }}" method="POST">
                @csrf
                <button type="submit" class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors {{ !$isExclusiveComingSoon ? 'bg-green-500' : 'bg-gray-600' }}">
                    <span class="sr-only">Toggle Coming Soon</span>
                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform {{ !$isExclusiveComingSoon ? 'translate-x-6' : 'translate-x-1' }}"></span>
                </button>
            </form>
        </div>

        <hr class="border-gray-700 my-6">

        <!-- Toggle untuk VVIP -->
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-medium text-white">Halaman VVIP</h3>
                 <p class="text-sm text-gray-400">
                    @if($isVVIPActive)
                        Status saat ini: <span class="font-semibold text-green-400">AKTIF</span>. Pengunjung bisa melihat halaman VVIP.
                    @else
                        Status saat ini: <span class="font-semibold text-yellow-400">COMING SOON</span>. Pengunjung tidak bisa melihat halaman VVIP.
                    @endif
                </p>
            </div>
            
            <form action="{{ route('admin.settings.toggleVVIP') }}" method="POST">
                @csrf
                <button type="submit" class="relative inline-flex items-center h-6 rounded-full w-11 transition-colors {{ $isVVIPActive ? 'bg-green-500' : 'bg-gray-600' }}">
                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform {{ $isVVIPActive ? 'translate-x-6' : 'translate-x-1' }}"></span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection