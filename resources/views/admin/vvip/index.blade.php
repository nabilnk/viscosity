@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Manajemen Konten Halaman VVIP</h1>
    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.vvip.update') }}">
            @csrf
            <div class="mb-4">
                <label for="rules" class="block font-medium text-sm text-gray-300">Rules (Satu aturan per baris)</label>
                <textarea id="rules" name="rules" rows="5" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm">{{ old('rules', $setting->rules) }}</textarea>
            </div>
            <div class="mb-6">
                <label for="benefits" class="block font-medium text-sm text-gray-300">Benefits (Satu benefit per baris)</label>
                <textarea id="benefits" name="benefits" rows="5" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm">{{ old('benefits', $setting->benefits) }}</textarea>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold px-5 py-2 rounded-lg">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection