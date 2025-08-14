@extends('layouts.admin')

@section('content')
@php
    $yt = $nofreq->youtube_link ?? '';
    $vid = null;
    if (preg_match('~(?:youtu\.be/|youtube\.com/(?:embed/|watch\?v=))([A-Za-z0-9_-]{6,})~', $yt, $m)) {
        $vid = $m[1];
    }
@endphp

<div class="container mx-auto py-10 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit NOFREQ (Liveset)</h1>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-600 text-white">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-600 text-white">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.nofreqs.update', $nofreq->id) }}" class="space-y-6">
        @csrf @method('PUT')

        <div>
            <label class="block mb-1 text-gray-200">Judul</label>
            <input type="text" name="title" value="{{ old('title', $nofreq->title) }}"
                   class="w-full bg-transparent text-gray-100 border-b border-gray-500 focus:outline-none focus:border-purple-400 h-10"
                   required>
        </div>

        <div>
            <label class="block mb-1 text-gray-200">YouTube Link</label>
            <input type="url" name="youtube_link" value="{{ old('youtube_link', $nofreq->youtube_link) }}"
                   class="w-full bg-transparent text-gray-100 border-b border-gray-500 focus:outline-none focus:border-purple-400 h-10"
                   required>
            <p class="text-xs text-gray-400 mt-1">Terima berbagai format: watch?v=, youtu.be, atau embed.</p>
        </div>

        <div>
            <label class="block mb-2 text-gray-200">Preview</label>
            @if ($vid)
                <div class="w-full aspect-video">
                    <iframe class="w-full h-full rounded" src="https://www.youtube.com/embed/{{ $vid }}" title="YouTube video" frameborder="0" allowfullscreen></iframe>
                </div>
            @else
                <div class="p-3 rounded bg-gray-800 text-gray-400">Link belum valid untuk preview.</div>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="px-4 py-2 rounded bg-purple-600 text-white hover:bg-purple-700 transition">
                Update
            </button>
            <a href="{{ route('admin.nofreqs.index') }}" class="ml-3 px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-600 transition">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
