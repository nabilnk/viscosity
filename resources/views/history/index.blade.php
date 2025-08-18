<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4 py-16">
            <h1 class="text-3xl font-bold text-white mb-8">Riwayat Tiket Anda</h1>

            <div class="bg-gray-800/50 rounded-lg shadow-md border border-gray-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-700/50">
                            <tr>
                                <th class="text-left text-white px-6 py-4">Nama Event</th>
                                <th class="text-left text-white px-6 py-4">Tanggal Event</th>
                                <th class="text-left text-white px-6 py-4">Lokasi</th>
                                <th class="text-center text-white px-6 py-4">Jumlah</th>
                                <th class="text-left text-white px-6 py-4">Status</th>
                                <th class="text-center text-white px-6 py-4">Invoice</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300">
                            @forelse($transactions as $transaction)
                            <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                                <td class="px-6 py-4 font-semibold">{{ $transaction->event->nama_event }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaction->event->tanggal_event)->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $transaction->event->lokasi }}</td>
                                <td class="px-6 py-4 text-center">{{ $transaction->jumlah_tiket }}</td>
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
                                    {{-- Tombol hanya muncul jika sudah lunas --}}
                                    @if($transaction->status_pembayaran == 'paid')
                                        <a href="{{ route('ticket.show', $transaction->order_id) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-4 py-2 rounded-lg text-sm">
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-gray-500">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-400 p-6">Anda belum memiliki riwayat pembelian tiket.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>