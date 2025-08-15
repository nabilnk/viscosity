@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Daftar Pengguna</h1>
         <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
            Kembali ke Dashboard
        </a>
    <table class="w-full mt-6 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection