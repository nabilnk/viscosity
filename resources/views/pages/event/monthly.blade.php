<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4 py-16">
            
            {{-- GRID UNTUK KARTU EVENT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($events as $event)
                    @php
                        // Membuat pesan WhatsApp dinamis
                        $waMessage = urlencode("Halo, saya mau RSVP untuk event " . $event->nama_event . ".");
                        $waLink = "https://wa.me/" . $waNumber . "?text=" . $waMessage;
                    @endphp

                    {{-- KARTU EVENT DINAMIS --}}
                    <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                        <x-skeleton class="w-full h-80">
                            <img src="{{ asset('storage/events/' . $event->gambar) }}" 
                                 alt="Flyer {{ $event->nama_event }}" 
                                 class="w-full h-full object-cover opacity-0 transition-opacity duration-500" 
                                 onload="this.style.opacity = 1"
                            />
                        </x-skeleton>
                        <div class="p-6 flex-grow flex flex-col justify-between text-white">
                            <div>
                                <p class="font-semibold text-lg">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d F Y') }}</p>
                                <p class="text-gray-400">at {{ $event->lokasi }}</p>
                            </div>
                            <a href="{{ $waLink }}" 
                               target="_blank"
                               class="mt-4 bg-zinc-800 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-zinc-700 transition-colors">
                                RSVP
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Pesan jika tidak ada event --}}
                    <p class="text-white text-center col-span-3 text-xl">
                        Tidak ada event bulanan yang tersedia saat ini.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>