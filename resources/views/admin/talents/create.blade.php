@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
        <h1 class="text-2xl font-bold text-white mb-6">Tambah Talent Baru</h1>
        <form method="POST" action="{{ route('admin.talents.store') }}" enctype="multipart/form-data">
            @csrf
            
            <!-- Nama Talent -->
            <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-300">Nama Talent</label>
                <input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm" required value="{{ old('name') }}">
                @error('name') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-300">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm">{{ old('description') }}</textarea>
                @error('description') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>
            
            <!-- Foto Utama (Profil) -->
            <div class="mb-4">
                <label for="photo" class="block font-medium text-sm text-gray-300">Foto Utama (untuk slider)</label>
                <input id="photo" name="photo" type="file" class="mt-1 block w-full text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" required>
                @error('photo') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Foto Dokumentasi (Detail) -->
            <div class="mb-6">
                <label for="documentation_photo" class="block font-medium text-sm text-gray-300">Foto Dokumentasi (untuk detail)</label>
                <input id="documentation_photo" name="documentation_photo" type="file" class="mt-1 block w-full text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700" required>
                @error('documentation_photo') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold px-5 py-2 rounded-lg">Simpan Talent</button>
                <a href="{{ route('admin.talents.index') }}" class="text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection