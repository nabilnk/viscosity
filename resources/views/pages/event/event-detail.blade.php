<x-app-layout>
    <div class="pt-32 pb-16 bg-black/60 backdrop-blur-sm min-h-screen text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                
                <!-- Gambar Event -->
                <div>
                    <img src="{{ asset('storage/events/' . $event->gambar) }}" alt="{{ $event->nama_event }}" class="w-full rounded-lg shadow-lg">
                </div>

                <!-- Detail & Form Pembelian -->
                <div class="bg-zinc-900/80 p-6 rounded-lg">
                    <h1 class="text-4xl font-bold mb-2">{{ $event->nama_event }}</h1>
                    <div class="text-lg text-gray-300 mb-4">
                        <p><i class="far fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('l, d F Y') }}</p>
                        <p><i class="far fa-clock mr-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('H:i') }} WIB</p>
                        <p><i class="fas fa-map-marker-alt mr-2"></i>{{ $event->lokasi }}</p>
                    </div>

                    <p class="text-gray-400 mb-6">{{ $event->deskripsi }}</p>

                    <hr class="border-gray-700 my-6">

                    <!-- Form Pembelian -->
                    @if($event->stok_tiket > 0)
                        <form action="{{ route('event.pay', $event->id) }}" method="POST">
                            @csrf
                            <h3 class="text-2xl font-semibold mb-2">Beli Tiket</h3>
                            <p class="text-xl text-purple-400 font-bold mb-4">Rp {{ number_format($event->harga_tiket) }}</p>

                            <div class="mb-4">
                                <label for="jumlah_tiket" class="block font-medium text-sm text-gray-300">Jumlah Tiket (Sisa: {{ $event->stok_tiket }})</label>
                                <input type="number" name="jumlah_tiket" id="jumlah_tiket" value="1" min="1" max="{{ $event->stok_tiket }}" class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm">
                            </div>

                            <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                                Lanjutkan ke Pembayaran
                            </button>
                        </form>
                    @else
                        <div class="p-4 bg-red-900/50 border border-red-500 rounded-lg text-center">
                            <p class="font-bold text-red-300">TIKET HABIS TERJUAL</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>