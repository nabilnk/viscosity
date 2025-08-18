@extends('layouts.admin')

@section('content')
<div class="px-6 py-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">Dashboard</h1>
            <p class="text-gray-400">Ringkasan aktivitas terbaru</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded-lg">
            + New Event
        </a>
    </div>

    <!-- KARTU STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <!-- Card: Users -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <p class="text-sm font-medium text-gray-400">Users</p>
            <p class="text-3xl font-bold text-white mt-2">{{ number_format($totalUsers) }}</p>
        </div>
        <!-- Card: Orders -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <p class="text-sm font-medium text-gray-400">Orders (Paid)</p>
            <p class="text-3xl font-bold text-white mt-2">{{ number_format($totalOrders) }}</p>
        </div>
        <!-- Card: Revenue -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <p class="text-sm font-medium text-gray-400">Revenue</p>
            <p class="text-3xl font-bold text-white mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
        <!-- Card: Active Events -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <p class="text-sm font-medium text-gray-400">Active Events</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $activeEvents }}</p>
        </div>
    </div>

    <!-- TABEL RECENT ORDERS -->
    <div class="mt-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-white">Recent Orders</h2>
            <a href="{{ route('admin.transactions.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">View all</a>
        </div>
        <div class="bg-gray-800 rounded-lg shadow-md border border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="text-left text-white px-6 py-3">Order #</th>
                            <th class="text-left text-white px-6 py-3">Customer</th>
                            <th class="text-left text-white px-6 py-3">Event</th>
                            <th class="text-left text-white px-6 py-3">Total</th>
                            <th class="text-left text-white px-6 py-3">Status</th>
                            <th class="text-center text-white px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        @forelse($recentOrders as $order)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                            <td class="px-6 py-4 font-mono text-sm">{{ $order->order_id }}</td>
                            <td class="px-6 py-4">{{ $order->user->name }}</td>
                            <td class="px-6 py-4">{{ $order->event->nama_event }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($order->total_harga) }}</td>
                            <td class="px-6 py-4">
                                @if($order->status_pembayaran == 'paid')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-green-900">Paid</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-yellow-900">{{ ucfirst($order->status_pembayaran) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.transactions.invoice', $order->order_id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-md text-xs font-bold" target="_blank">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-400 p-6">Tidak ada transaksi terbaru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection