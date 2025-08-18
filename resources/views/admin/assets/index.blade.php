@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manajemen Aset Halaman Home</h1>
        <a href="{{ route('admin.assets.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg">Tambah Aset Baru</a>
    </div>

    @if(session('success'))
        <div class="bg-green-500/20 border border-green-500 text-green-300 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- NAVIGASI FILTER / TAB -->
    <div class="mb-6 border-b border-gray-700">
        <nav class="-mb-px flex space-x-6" aria-label="Tabs">
            <a href="{{ route('admin.assets.index', ['filter' => 'tra_docs']) }}"
               class="px-3 py-2 font-medium text-sm rounded-t-md {{ $activeFilter == 'tra_docs' ? 'border-b-2 border-indigo-500 text-indigo-400' : 'text-gray-400 hover:text-white' }}">
                TRA dan DOCS
            </a>
            <a href="{{ route('admin.assets.index', ['filter' => 'team']) }}"
               class="px-3 py-2 font-medium text-sm rounded-t-md {{ $activeFilter == 'team' ? 'border-b-2 border-indigo-500 text-indigo-400' : 'text-gray-400 hover:text-white' }}">
                Our Team
            </a>
            <a href="{{ route('admin.assets.index', ['filter' => 'collaboration']) }}"
               class="px-3 py-2 font-medium text-sm rounded-t-md {{ $activeFilter == 'collaboration' ? 'border-b-2 border-indigo-500 text-indigo-400' : 'text-gray-400 hover:text-white' }}">
                Collaboration
            </a>
        </nav>
    </div>

    <!-- TABEL DINAMIS -->
    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="w-1/3 text-left text-white px-6 py-3">Gambar</th>
                    
                    {{-- Judul kolom dinamis --}}
                    @if($activeFilter == 'tra_docs')
                        <th class="text-left text-white px-6 py-3">Tipe</th>
                    @elseif($activeFilter == 'team')
                        <th class="text-left text-white px-6 py-3">Nama</th>
                        <th class="text-left text-white px-6 py-3">Jabatan</th>
                    @endif
                    
                    <th class="w-1/4 text-center text-white px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($assets as $asset)
                <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                    <td class="px-6 py-4"><img src="{{ asset('storage/assets_home/' . $asset->image) }}" alt="Aset" class="h-16 w-auto rounded"></td>
                    
                    {{-- Isi kolom dinamis --}}
                    @if($activeFilter == 'tra_docs')
                        <td class="px-6 py-4">
                            @if($asset->type == 'track_record')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-blue-100">Track Record</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-500 text-purple-100">Documentation</span>
                            @endif
                        </td>
                    @elseif($activeFilter == 'team')
                        <td class="px-6 py-4">{{ $asset->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $asset->position ?? '-' }}</td>
                    @endif

                    <td class="px-6 py-4 flex space-x-2 justify-center">
                        <a href="{{ route('admin.assets.edit', $asset->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</a>
                        <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST" onsubmit="return confirm('Hapus aset ini?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    @php
                        $colspan = 2;
                        if ($activeFilter == 'tra_docs') $colspan = 3;
                        if ($activeFilter == 'team') $colspan = 4;
                    @endphp
                    <td colspan="{{ $colspan }}" class="text-center text-gray-400 p-6">Belum ada aset untuk kategori ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection