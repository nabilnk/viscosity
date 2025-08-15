@extends('layouts.admin')
@section('content')
<div class="container mx-auto py-10 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Manage Highlight Videos (NOFREQ)</h1>

    {{-- Session status --}}
    @if(session('success'))
    <div class="p-3 rounded bg-green-600 text-white mb-6">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('admin.nofreqs.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Video
        </a>
        <a href="{{ route('admin.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
          Kembali ke halaman admin
          </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto" style="max-height: 64vh;">
        <table class="min-w-full table-auto">
            <thead class="justify-between">
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Title</th>
                <th class="py-3 px-6 text-left">Youtube Link</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @forelse($nofreqs as $nofreq)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span>{{ $nofreq->title }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ $nofreq->youtube_link }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                            {{ $nofreq->youtube_link }}
                        </a>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <a href="{{ route('admin.nofreqs.edit', $nofreq->id) }}">
                                    Edit
                                </a>
                            </div>
                              <form action="{{ route('admin.nofreqs.destroy', $nofreq) }}" method="POST"
                                  onsubmit="return confirm('Hapus item ini?')">
                                @csrf @method('DELETE')
                               <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                   <button type="submit">Delete</button>
                                </div>
                                </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-3 px-6 text-center">Tidak ada data</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection