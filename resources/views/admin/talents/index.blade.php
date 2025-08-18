@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manajemen Talents</h1>
        <a href="{{ route('admin.talents.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg">Tambah Talent</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="text-left text-white px-6 py-3">Foto Profil</th>
                        <th class="text-left text-white px-6 py-3">Nama</th>
                        <th class="text-left text-white px-6 py-3">Deskripsi</th>
                        <th class="text-left text-white px-6 py-3">Foto Dokumentasi</th>
                        <th class="text-center text-white px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @forelse($talents as $talent)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                        <td class="px-6 py-4">
                            @if($talent->photo)
                                <img src="{{ Storage::url($talent->photo) }}" class="h-16 w-16 object-cover rounded-full">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 font-semibold">{{ $talent->name }}</td>
                        <td class="px-6 py-4 text-sm max-w-xs truncate">
                            {{ $talent->description ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                             @if($talent->documentation_photo)
                                <img src="{{ Storage::url($talent->documentation_photo) }}" class="h-16 w-auto object-cover rounded-md">
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 flex space-x-2 justify-center items-center">
                            <a href="{{ route('admin.talents.edit', $talent->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</a>
                            <form action="{{ route('admin.talents.destroy', $talent->id) }}" method="POST" onsubmit="return confirm('Hapus talent ini?')">
                                @csrf 
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-400 p-6">Belum ada data talent.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection