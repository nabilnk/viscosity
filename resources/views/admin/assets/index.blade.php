@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Asset Home</h1>
          <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
            Kembali ke Dashboard
          </a>
        <a href="{{ route('admin.assets.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Asset</a>

        {{-- Filter --}}
        <div class="mb-4">
            <form action="{{ route('admin.assets.index') }}" method="GET">
                <label for="type" class="mr-2">Tampilkan:</label>
                <select name="type" id="type" class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="this.form.submit()">
                    <option value="track_record" {{ $type === 'track_record' ? 'selected' : '' }}>Track Record</option>
                    <option value="our_team" {{ $type === 'our_team' ? 'selected' : '' }}>Our Team</option>
                </select>
            </form>
        </div>

        {{-- Tabel --}}
        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                     <th class="border px-4 py-2">Image</th>
                     @if($type === 'track_record')
                    <th class="border px-4 py-2">Documentation</th>
                       @else
                       <th class="border px-4 py-2">Name</th>
                       <th class="border px-4 py-2">Position</th>
                       @endif
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td class="border px-4 py-2">{{ $asset->type }}</td>
                       <td class="border px-4 py-2">
                            @if($asset->image)
                                <img src="{{ asset('storage/' . $asset->image) }}" alt="Asset Image" class="max-w-32 max-h-32">
                            @else
                                No Image
                            @endif
                        </td>
                     @if($type === 'track_record')
                       <td class="border px-4 py-2">
                            @if($asset->documentation)
                                <img src="{{ asset('storage/' . $asset->documentation) }}" alt="Asset Image" class="max-w-32 max-h-32">
                            @else
                                No Image
                            @endif
                        </td>
                       @else
                         <td class="border px-4 py-2">{{ $asset->name }}</td>
                        <td class="border px-4 py-2">{{ $asset->position }}</td>
                        @endif
                     <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.assets.edit', $asset) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.assets.destroy', $asset) }}" method="POST" onsubmit="return confirm('Hapus asset?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection