@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">VVIP Settings</h1>

        <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
            Kembali ke Dashboard
          </a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Coming Soon Mode</h2>

                <form method="POST" action="{{ route('admin.vvip.toggle') }}">
                    @csrf

                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                               onchange="this.form.submit()" @if($vvipSetting->is_active) checked @endif>

                        <div class="w-11 h-6 bg-gray-400 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-purple-600 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-purple-500"></div>
                        <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">Coming Soon</span>
                    </label>
                </form>

                @if (session('success'))
                    <div class="mt-4 text-green-500">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection