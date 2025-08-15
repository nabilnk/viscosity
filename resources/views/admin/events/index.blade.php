<x-admin-layout>
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Event Monthly</h1>
    <a href="{{ route('admin.events.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded">+ Tambah Event</a>

    <table class="w-full mt-6 border">
        <thead class="bg-gray-700 text-white">
            <tr>
                <th class="p-2">ID</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Tanggal</th>
                <th class="p-2">Lokasi</th>
                <th class="p-2">Harga Tiket</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr class="border-b">
                <td class="p-2">{{ $event->id }}</td>
                <td class="p-2">{{ $event->name }}</td>
                <td class="p-2">{{ $event->date }}</td>
                <td class="p-2">{{ $event->location }}</td>
                <td class="p-2">Rp {{ number_format($event->price) }}</td>
                <td class="p-2">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-admin-layout>

