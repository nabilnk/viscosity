@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Edit Asset Home</h1>

    <form method="POST" action="{{ route('admin.assets.update', $asset->id) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block">Kategori</label>
            <select name="category" class="w-full border p-2">
                <option value="track_record" {{ $asset->category == 'track_record' ? 'selected' : '' }}>Track Record</option>
                <option value="documentation" {{ $asset->category == 'documentation' ? 'selected' : '' }}>Documentation</option>
                <option value="our_team" {{ $asset->category == 'our_team' ? 'selected' : '' }}>Our Team</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Judul</label>
            <input type="text" name="title" value="{{ $asset->title }}" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border p-2">{{ $asset->description }}</textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
