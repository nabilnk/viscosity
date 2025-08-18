@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manajemen Video NOFREQ</h1>
        <a href="{{ route('admin.nofreqs.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg">Tambah Video</a>
    </div>
    {{-- ... (kode notifikasi success) ... --}}
    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="text-left text-white px-6 py-3">Judul Video</th>
                    <th class="text-left text-white px-6 py-3">Link YouTube</th>
                    <th class="text-center text-white px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($nofreqs as $nofreq)
                <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                    <td class="px-6 py-4">{{ $nofreq->title }}</td>
                    <td class="px-6 py-4"><a href="{{ $nofreq->youtube_link }}" target="_blank" class="text-indigo-400 hover:underline">{{ $nofreq->youtube_link }}</a></td>
                    <td class="px-6 py-4 flex space-x-2 justify-center">
                        <a href="{{ route('admin.nofreqs.edit', $nofreq->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</a>
                        <form action="{{ route('admin.nofreqs.destroy', $nofreq->id) }}" method="POST" onsubmit="return confirm('Hapus video ini?')">@csrf @method('DELETE')<button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">Hapus</button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center text-gray-400 p-6">Belum ada data video.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection