@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-xl font-bold mb-6">Edit Talent</h1>
    <form action="{{ route('admin.talents.update', $talent) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block">Nama Talent</label>
            <input type="text" name="name" value="{{ $talent->name }}" class="w-full border px-4 py-2" required>
        </div>
        <div>
            <label class="block">Foto Talent</label>
            <input type="file" name="photo" class="w-full border px-4 py-2">
            <img src="{{ asset('storage/'.$talent->photo) }}" class="h-20 mt-2">
        </div>
        <div>
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border px-4 py-2" required>{{ $talent->description }}</textarea>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
