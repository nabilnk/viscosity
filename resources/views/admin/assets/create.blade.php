@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Asset Home</h1>

    <form method="POST" action="{{ route('admin.assets.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block">Kategori</label>
            <select name="category" class="w-full border p-2">
                <option value="track_record">Track Record</option>
                <option value="documentation">Documentation</option>
                <option value="our_team">Our Team</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Judul</label>
            <input type="text" name="title" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
