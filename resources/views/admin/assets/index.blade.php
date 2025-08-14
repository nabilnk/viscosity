@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Asset Home</h1>
    <a href="{{ route('admin.assetHomes.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Asset</a>

    <table class="w-full mt-6 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Tipe</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">File/Link</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
                <tr>
                    <td class="border px-4 py-2">{{ $asset->type }}</td>
                    <td class="border px-4 py-2">{{ $asset->title }}</td>
                    <td class="border px-4 py-2">{{ $asset->description }}</td>
                    <td class="border px-4 py-2">{{ $asset->file }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.assetHomes.edit', $asset) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.assetHomes.destroy', $asset) }}" method="POST" onsubmit="return confirm('Hapus asset?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
