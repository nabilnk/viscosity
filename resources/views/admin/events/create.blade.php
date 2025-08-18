@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
        <h1 class="text-2xl font-bold text-white mb-6">Tambah Event Baru</h1>

        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
            @csrf
            
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-300">Title</label>
                <input id="title" name="title" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('title') }}">
                @error('title') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block font-medium text-sm text-gray-300">Location</label>
                <input id="location" name="location" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('location') }}">
                @error('location') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- City -->
            <div class="mb-4">
                <label for="city" class="block font-medium text-sm text-gray-300">City</label>
                <input id="city" name="city" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('city') }}">
                @error('city') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Date -->
            <div class="mb-4">
                <label for="date" class="block font-medium text-sm text-gray-300">Date</label>
                <input id="date" name="date" type="datetime-local" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required value="{{ old('date') }}">
                @error('date') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Flyer Image -->
            <div class="mb-4">
                <label for="flyer_image" class="block font-medium text-sm text-gray-300">Flyer Image</label>
                <input id="flyer_image" name="flyer_image" type="file" class="mt-1 block w-full text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                @error('flyer_image') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block font-medium text-sm text-gray-300">Type</label>
                <select id="type" name="type" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="monthly">Monthly</option>
                    <option value="exclusive">Exclusive</option>
                </select>
                @error('type') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>
            
            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block font-medium text-sm text-gray-300">Price</label>
                <input id="price" name="price" type="number" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required placeholder="Contoh: 50000" value="{{ old('price') }}">
                @error('price') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Status (is_published) -->
            <div class="mb-4">
                <label for="is_published" class="block font-medium text-sm text-gray-300">Status</label>
                <select id="is_published" name="is_published" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1">Publish</option>
                    <option value="0">Coming Soon</option>
                </select>
                @error('is_published') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold px-5 py-2 rounded-lg">Simpan</button>
                <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-white">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection