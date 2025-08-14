@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">NOFREQ (Liveset)</h1>
        <a href="{{ route('admin.nofreqs.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
            + Tambah NOFREQ
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-600 text-white">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-gray-800 rounded shadow">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left">YouTube Link</th>
                    <th class="px-4 py-3 text-left">Preview</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-100">
                @forelse ($nofreqs as $nofreq)
                    <tr>
                        <td class="px-4 py-3">{{ $nofreq->id }}</td>
                        <td class="px-4 py-3">{{ $nofreq->title }}</td>
                        <td class="px-4 py-3 break-all">
                            <a href="{{ $nofreq->youtube_link }}" target="_blank" class="text-blue-400 underline">
                                {{ $nofreq->youtube_link }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @php
                                // Ambil video id dari link YouTube umum (watch?v= / youtu.be / embed)
                                $yt = $nofreq->youtube_link ?? '';
                                $vid = null;
                                if (preg_match('~(?:youtu\.be/|youtube\.com/(?:embed/|watch\?v=))([A-Za-z0-9_-]{6,})~', $yt, $m)) {
                                    $vid = $m[1];
                                }
                            @endphp
                            @if ($vid)
                                <div class="w-64 aspect-video">
                                    <iframe class="w-full h-full rounded" src="https://www.youtube.com/embed/{{ $vid }}" title="YouTube video" frameborder="0" allowfullscreen></iframe>
                                </div>
                            @else
                                <span class="text-gray-400">Link tidak valid</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.nofreqs.edit', $nofreq->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                            <form action="{{ route('admin.nofreqs.destroy', $nofreq->id) }}" method="POST" class="inline-block ml-3"
                                  onsubmit="return confirm('Hapus item ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-6 text-center text-gray-400" colspan="5">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
