@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Event Exclusive</h1>

    <div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" id="exclusive-toggle" class="form-checkbox" {{ $exclusiveActive ? 'checked' : '' }}>
            <span class="ml-2">Aktifkan Exclusive Events (Coming Soon jika OFF)</span>
        </label>
    </div>

    @if(!$exclusiveActive)
        <div class="p-6 bg-yellow-100 border rounded">⚠️ Halaman Event Exclusive sedang dalam status <strong>Coming Soon</strong></div>
    @else
        <a href="{{ route('admin.events.exclusive.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah Event Exclusive</a>

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Nama Event</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Lokasi</th>
                    <th class="border px-4 py-2">Kota</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td class="border px-4 py-2">{{ $event->title }}</td>
                        <td class="border px-4 py-2">{{ $event->date }}</td>
                        <td class="border px-4 py-2">{{ $event->location }}</td>
                        <td class="border px-4 py-2">{{ $event->city }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.events.exclusive.edit', $event) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('admin.events.exclusive.destroy', $event) }}" method="POST" onsubmit="return confirm('Hapus event?')">
                                @csrf @method('DELETE')
                                <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
