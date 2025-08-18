@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700" x-data="{ type: '{{ $asset->type }}' }">
        <h1 class="text-2xl font-bold text-white mb-6">Edit Aset Halaman Home</h1>
        <form method="POST" action="{{ route('admin.assets.update', $asset->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="type" class="block font-medium text-sm text-gray-300">Tipe Aset</label>
                <select id="type" name="type" x-model="type" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm" required>
                    <option value="track_record" @selected($asset->type == 'track_record')>Track Record Activity</option>
                    <option value="documentation" @selected($asset->type == 'documentation')>Documentation</option>
                    <option value="team" @selected($asset->type == 'team')>Our Team</option>
                    <option value="collaboration" @selected($asset->type == 'collaboration')>Collaboration</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-sm text-gray-300">Ganti Gambar (Opsional)</label>
                <input id="image" name="image" type="file" class="mt-1 block w-full text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                @if($asset->image)
                    <img src="{{ asset('storage/assets_home/' . $asset->image) }}" alt="Current Image" class="mt-2 rounded-lg" style="max-width: 200px;">
                @endif
            </div>

            <!-- Input yang hanya muncul jika type = 'team' -->
            <div x-show="type === 'team'" x-transition class="border-t border-gray-700 pt-4 mt-4">
                <p class="text-sm text-gray-400 mb-4">Isi detail untuk anggota tim (opsional).</p>
                <div class="mb-4">
                    <label for="name" class="block font-medium text-sm text-gray-300">Nama Anggota Tim</label>
                    <input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm" value="{{ old('name', $asset->name) }}">
                </div>
                <div class="mb-4">
                    <label for="position" class="block font-medium text-sm text-gray-300">Jabatan</label>
                    <input id="position" name="position" type="text" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm" value="{{ old('position', $asset->position) }}">
                </div>
            </div>

            <div class="flex items-center space-x-4 mt-6">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-5 py-2 rounded-lg">Update</button>
                <a href="{{ route('admin.assets.index') }}" class="text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection