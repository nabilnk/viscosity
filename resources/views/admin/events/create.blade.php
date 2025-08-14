@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Tambah Event Monthly</h1>

    <form method="POST" action="{{ route('admin.events.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block">Nama Event</label>
            <input type="text" name="name" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Tanggal</label>
            <input type="date" name="date" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Lokasi</label>
            <input type="text" name="location" class="w-full border p-2">
        </div>
        <div class="mb-4">
            <label class="block">Harga Tiket</label>
            <input type="number" name="price" class="w-full border p-2">
        </div>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded">Simpan</button>
    </form>
</div>
@endsection
