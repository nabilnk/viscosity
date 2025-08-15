@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Tiket</h1>

        <a href="{{ route('admin.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4">
            Kembali ke Dashboard
        </a>
        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">User</th>
                    <th class="border px-4 py-2">Event</th>
                    <th class="border px-4 py-2">Invoice</th>
                    <th class="border px-4 py-2">Payment Status</th>
                    <th class="border px-4 py-2">Payment Method</th>
                    <th class="border px-4 py-2">Amount</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td class="border px-4 py-2">{{ $ticket->user->name }}</td>
                    <td class="border px-4 py-2">{{ $ticket->event->title }}</td>
                    <td class="border px-4 py-2">{{ $ticket->invoice }}</td>
                    <td class="border px-4 py-2">{{ $ticket->payment_status }}</td>
                    <td class="border px-4 py-2">{{ $ticket->payment_method }}</td>
                    <td class="border px-4 py-2">{{ $ticket->amount }}</td>
                    <td class="border px-4 py-2">
                        {{-- Add actions like view, edit, delete later --}}
                         <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection