@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Edit Event Monthly</h1>

    <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block">Nama Event</label>
            <input type="text" name="name" value="{{ $event->name }}" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Tanggal</label>
            <input type="date" name="date" value="{{ $event->date }}" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Lokasi</label>
            <input type="text" name="location" value="{{ $event->location }}" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Harga Tiket</label>
            <input type="number" name="price" value="{{ $event->price }}" class="w-full border p-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
