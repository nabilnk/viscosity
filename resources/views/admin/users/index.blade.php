@extends('layouts.admin')
@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold text-white mb-6">Kelola Pengguna</h1>
    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="text-left text-white px-6 py-3">Nama</th>
                    <th class="text-left text-white px-6 py-3">Email</th>
                    <th class="text-left text-white px-6 py-3">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($users as $user)
                <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center text-gray-400 p-6">Belum ada pengguna terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection