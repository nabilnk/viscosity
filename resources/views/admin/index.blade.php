@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <a href="{{ route('admin.assets.index') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            Asset Home
        </a>

        <a href="{{ route('admin.events.index') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            Event Monthly
        </a>

        <a href="{{ route('admin.events.exclusive') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            Event Exclusive (Coming Soon)
        </a>

        <a href="{{ route('admin.talents.index') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            Talents
        </a>

        <a href="{{ route('admin.nofreqs.index') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            NOFREQ
        </a>

        <a href="{{ route('admin.vvip.index') }}" class="p-6 bg-gray-800 text-white rounded-lg shadow hover:bg-purple-600 transition">
            VVIP (Coming Soon)
        </a>
    </div>
</div>
@endsection
