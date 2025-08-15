<x-admin-layout>
<div class="container mx-auto py-10 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Tambah NOFREQ (Liveset)</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-600 text-white">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.nofreqs.store') }}" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-1 text-gray-200">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full bg-transparent text-gray-100 border-b border-gray-500 focus:outline-none focus:border-purple-400 h-10"
                   placeholder="Judul liveset" required>
        </div>

        <div>
            <label class="block mb-1 text-gray-200">YouTube Link</label>
            <input type="url" name="youtube_link" value="{{ old('youtube_link') }}"
                   class="w-full bg-transparent text-gray-100 border-b border-gray-500 focus:outline-none focus:border-purple-400 h-10"
                   placeholder="https://www.youtube.com/watch?v=..." required>
            <p class="text-xs text-gray-400 mt-1">Terima berbagai format: watch?v=, youtu.be, atau embed.</p>
        </div>

        <div class="pt-2">
            <button type="submit" class="px-4 py-2 rounded bg-purple-600 text-white hover:bg-purple-700 transition">
                Simpan
            </button>
            <a href="{{ route('admin.nofreqs.index') }}" class="ml-3 px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-600 transition">
                Batal
            </a>
        </div>
    </form>
</div>
</x-admin-layout>
