@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
        <h1 class="text-2xl font-bold text-white mb-6">Edit Video NOFREQ</h1>
        <form method="POST" action="{{ route('admin.nofreqs.update', $nofreq->id) }}">
            @csrf
            @method('PUT')
            
            <!-- Judul Video -->
            <div class="mb-4">
                <label for="title" class="block font-medium text-sm text-gray-300">Judul Video</label>
                <input id="title" name="title" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm" required value="{{ old('title', $nofreq->title) }}">
                @error('title') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Link YouTube -->
            <div class="mb-6">
                <label for="youtube_link" class="block font-medium text-sm text-gray-300">Link YouTube</label>
                <input id="youtube_link" name="youtube_link" type="url" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm" required value="{{ old('youtube_link', $nofreq->youtube_link) }}">
                @error('youtube_link') <p class="text-sm text-red-400 mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-5 py-2 rounded-lg">Update Video</button>
                <a href="{{ route('admin.nofreqs.index') }}" class="text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection