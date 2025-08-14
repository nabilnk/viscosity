@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">VVIP Settings</h1>

    <div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" id="vvip-toggle" class="form-checkbox" {{ $vvipActive ? 'checked' : '' }}>
            <span class="ml-2">Aktifkan VVIP (Coming Soon jika OFF)</span>
        </label>
    </div>

    @if(!$vvipActive)
        <div class="p-6 bg-yellow-100 border rounded">⚠️ Halaman VVIP sedang dalam status <strong>Coming Soon</strong></div>
    @else
        <form action="{{ route('admin.vvip.update') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block">Rules</label>
                <textarea name="rules" class="w-full border px-4 py-2">{{ $vvip->rules }}</textarea>
            </div>
            <div>
                <label class="block">Benefits</label>
                <textarea name="benefits" class="w-full border px-4 py-2">{{ $vvip->benefits }}</textarea>
            </div>
            <div>
                <label class="block">Achievement Spending</label>
                <textarea name="achievement" class="w-full border px-4 py-2">{{ $vvip->achievement }}</textarea>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    @endif
</div>
@endsection
