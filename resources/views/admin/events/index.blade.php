@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Events</h1>
        <a href="{{ route('admin.events.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg">Tambah Event Baru</a>
    </div>

    <!-- FORM FILTER -->
    <div class="bg-gray-800 p-4 rounded-lg shadow-md mb-6 border border-gray-700">
        <form action="{{ route('admin.events.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            
            <!-- Filter by Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-300">Tipe Event</label>
                <select name="type" id="type" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Semua Tipe</option>
                    <option value="monthly" {{ request('type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="exclusive" {{ request('type') == 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                </select>
            </div>

            <!-- Filter by Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-300">Status Publikasi</label>
                <select name="status" id="status" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Semua Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="coming_soon" {{ request('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                </select>
            </div>

            <!-- Filter by Period -->
            <div>
                <label for="period" class="block text-sm font-medium text-gray-300">Periode Waktu</label>
                <select name="period" id="period" class="mt-1 block w-full py-2 px-3 border border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Semua Waktu</option>
                    <option value="upcoming" {{ request('period') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="past" {{ request('period') == 'past' ? 'selected' : '' }}>Past</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex space-x-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-lg">Filter</button>
                <a href="{{ route('admin.events.index') }}" class="w-full text-center bg-gray-600 hover:bg-gray-700 text-white font-bold px-4 py-2 rounded-lg">Reset</a>
            </div>
        </form>
    </div>

    <!-- Tabel Data Event -->
    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="text-left text-white px-6 py-3">Nama Event</th>
                    <th class="text-left text-white px-6 py-3">Tipe</th>
                    <th class="text-left text-white px-6 py-3">Tanggal</th>
                    <th class="text-left text-white px-6 py-3">Harga</th>
                    <th class="text-left text-white px-6 py-3">Status</th>
                    <th class="text-center text-white px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($events as $event)
                <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                    <td class="px-6 py-4">{{ $event->nama_event }}</td>
                    <td class="px-6 py-4 capitalize">{{ $event->type }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y, H:i') }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($event->harga_tiket) }}</td>
                    <td class="px-6 py-4">
                        @if($event->is_coming_soon)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-yellow-900">
                                Coming Soon
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-green-900">
                                Published
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex space-x-2 justify-center">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus event?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400 p-6">Tidak ada event yang cocok dengan filter yang dipilih.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection