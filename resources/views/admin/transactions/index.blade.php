@extends('layouts.admin')

@section('content')
<div class="px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Manajemen Transaksi</h1>
    </div>

    <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="text-left text-white px-6 py-3">Order ID</th>
                    <th class="text-left text-white px-6 py-3">User</th>
                    <th class="text-left text-white px-6 py-3">Event</th>
                    <th class="text-left text-white px-6 py-3">Total</th>
                    <th class="text-left text-white px-6 py-3">Status</th>
                    <th class="text-center text-white px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @forelse($transactions as $transaction)
                <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                    <td class="px-6 py-4 font-mono">{{ $transaction->order_id }}</td>
                    <td class="px-6 py-4">{{ $transaction->user->name }}</td>
                    <td class="px-6 py-4">{{ $transaction->event->nama_event }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($transaction->total_harga) }}</td>
                    <td class="px-6 py-4">
                        @if($transaction->status_pembayaran == 'paid')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-green-900">
                                Lunas
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-yellow-900">
                                {{ ucfirst($transaction->status_pembayaran) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.transactions.invoice', $transaction->order_id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm font-bold" target="_blank">
                            Invoice PDF
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400 p-6">Belum ada transaksi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection