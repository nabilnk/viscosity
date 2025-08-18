<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm">
        <div class="container mx-auto px-4 py-16">
            
            {{-- GRID UNTUK KARTU EVENT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- KARTU EVENT 1 --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    <x-skeleton class="w-full h-auto">
                        <img src="{{ asset('assets/events/flyer1.jpg') }}" 
                             alt="Event Flyer 1" 
                             class="w-full h-auto object-cover opacity-0 transition-opacity duration-500" />
                    </x-skeleton>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">31-10-2024</p>
                            <p class="text-gray-400">at Post 99</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20mau%20RSVP%20untuk%20event%20di%20Post%2099." 
                           target="_blank"
                           class="mt-4 bg-zinc-800 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-zinc-700 transition-colors">
                            RSVP
                        </a>
                    </div>
                </div>

                {{-- KARTU EVENT 2 --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    <x-skeleton class="w-full h-auto">
                        <img src="{{ asset('assets/events/flyer2.jpg') }}" 
                             alt="Event Flyer 2" 
                             class="w-full h-auto object-cover opacity-0 transition-opacity duration-500" />
                    </x-skeleton>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">17-12-2024</p>
                            <p class="text-gray-400">at To and Fro</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20mau%20RSVP%20untuk%20event%20Kelas%20Akhir."
                           target="_blank"
                           class="mt-4 bg-zinc-800 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-zinc-700 transition-colors">
                            RSVP
                        </a>
                    </div>
                </div>

                {{-- KARTU EVENT 3 --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    <x-skeleton class="w-full h-auto">
                        <img src="{{ asset('assets/events/flyer3.jpg') }}" 
                             alt="Event Flyer 3" 
                             class="w-full h-auto object-cover opacity-0 transition-opacity duration-500" />
                    </x-skeleton>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">13-06-2025</p>
                            <p class="text-gray-400">at To and Fro</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20mau%20RSVP%20untuk%20event%20Resonance."
                           target="_blank"
                           class="mt-4 bg-zinc-800 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-zinc-700 transition-colors">
                            RSVP
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
