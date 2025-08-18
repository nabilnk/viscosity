<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4 py-16">
            
            {{-- GRID UNTUK KARTU EVENT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($events as $event)
                    <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                        
                        {{-- Flyer Event Dinamis --}}
                        <img src="{{ asset('storage/events/'.$event->gambar) }}" 
                             alt="{{ $event->nama_event }}" 
                             class="w-full h-80 object-cover">

                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                {{-- Tanggal, Lokasi, dan Kota Dinamis --}}
                                <p class="font-semibold text-lg text-white">
                                    {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}
                                </p>
                                <p class="text-gray-400">at {{ $event->lokasi }}</p>
                            </div>

                            {{-- Tombol Buy Ticket Dinamis --}}
                            <a href="{{ route('event.detail', $event->id) }}" class="mt-4 bg-purple-600 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                                BUY TICKET
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Pesan jika tidak ada event --}}
                    <p class="text-white text-center col-span-3 text-xl">
                        Tidak ada event eksklusif yang tersedia saat ini. Nantikan segera!
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>