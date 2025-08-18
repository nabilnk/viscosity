<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4 py-16">
            
            {{-- GRID UNTUK KARTU EVENT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($events as $event)
                    @if($event->type === "exclusive" && $event->is_published)
                        <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                            
                            {{-- Flyer Event --}}
                            <img src="{{ asset('storage/'.$event->flyer) }}" 
                                 alt="{{ $event->title }}" 
                                 class="w-full h-64 object-cover">

                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <p class="font-semibold text-lg">
                                        {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}
                                    </p>
                                    <p class="text-gray-400">at {{ $event->venue }}</p>
                                    <p class="text-gray-400">{{ $event->city }}</p>
                                </div>

                                {{-- Tombol Buy Ticket --}}
                                <a href="{{ route('event.pay', ['event' => $event->id]) }}" 
                                   class="mt-4 bg-purple-600 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                                    BUY TICKET
                                </a>
                            </div>
                        </div>
                    @endif
                @empty
                    <p class="text-white text-center col-span-3">No exclusive events available.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
