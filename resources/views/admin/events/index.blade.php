@extends('layouts.admin')
@section('content')
    <div class="container mx-auto p-6">
                @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show"
                class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-300"
            >
                {{ session('success') }}
            </div>
                @endif

        <h1 class="text-2xl font-bold mb-6">Daftar Events</h1>
        <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
            Kembali ke Dashboard
        </a>
        <a href="{{ route('admin.events.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Tambah Event Baru
        </a>

        {{-- Filter --}}
        <div class="mb-4 flex justify-between items-center">
            <form action="{{ route('admin.events.index') }}" method="GET">
                <label for="type" class="mr-2">Filter Type:</label>
                <select name="type" id="type" class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="this.form.submit()">
                    <option value="" {{ request('type') == '' ? 'selected' : '' }}>All</option>
                    <option value="monthly" {{ request('type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="exclusive" {{ request('type') == 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                </select>
            </form>

            {{-- Slide Switch (Coming Soon) --}}
            @if(request('type') == 'exclusive')
                <form method="POST" action="{{ route('admin.events.toggleComingSoon') }}">
                    @csrf
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_coming_soon" class="sr-only peer"
                            onchange="this.form.submit()" {{ $isComingSoon ? 'checked' : '' }}>
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700
                                    peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800
                                    peer-checked:after:translate-x-full peer-checked:after:border-white
                                    after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                    after:bg-white after:border-gray-300 after:border after:rounded-full
                                    after:h-5 after:w-5 after:transition-all dark:border-gray-600
                                    peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Coming Soon</span>
                    </label>
                </form>
            @endif
        </div>

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Type</th>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Location</th>
                    <th class="border px-4 py-2">City</th>
                    <th class="border px-4 py-2">Flyer Image</th>
                    <th class="border px-4 py-2">Status</th> {{-- COMING SOON --}}
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td class="border px-4 py-2">{{ $event->title }}</td>
                    <td class="border px-4 py-2">{{ $event->type }}</td>
                    <td class="border px-4 py-2">{{ $event->date }}</td>
                    <td class="border px-4 py-2">{{ $event->location }}</td>
                    <td class="border px-4 py-2">{{ $event->city }}</td>
                    <td class="border px-4 py-2">
                      @if($event->flyer_image)
                            <img src="{{ asset('storage/' . $event->flyer_image) }}" alt="Event Image" style="max-width: 100px; max-height: 100px;">
                        @else
                             No Image
                        @endif
                      </td>
                    <td class="border px-4 py-2">
                        {{ $event->is_published ? 'Published' : 'Coming Soon' }}
                    </td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Hapus event?')">
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