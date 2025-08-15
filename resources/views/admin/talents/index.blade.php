<x-admin-layout>

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Talents</h1>
    <a href="{{ route('admin.talents.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Talent</a>

    <table class="w-full mt-6 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Foto</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Deskripsi</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($talents as $talent)
                <tr>
                    <td class="border px-4 py-2"><img src="{{ asset('storage/'.$talent->photo) }}" class="h-16"></td>
                    <td class="border px-4 py-2">{{ $talent->name }}</td>
                    <td class="border px-4 py-2">{{ $talent->description }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.talents.edit', $talent) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.talents.destroy', $talent) }}" method="POST" onsubmit="return confirm('Hapus talent?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-admin-layout>

