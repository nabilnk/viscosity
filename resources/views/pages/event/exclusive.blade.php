<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm">
        <div class="container mx-auto px-4 py-16">
            
            {{-- HEADER DAN FILTER --}}
            <div class="text-center mb-12">
                <div class="mt-5 inline-block">
                    {{-- Tombol filter ini belum berfungsi, hanya tampilan --}}
                    <button class="bg-white text-black font-semibold py-2 px-4 rounded-full flex items-center space-x-2">
                        <span>Filter by month</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- GRID UNTUK KARTU EVENT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- KARTU EVENT 1 (TEMPLATE) --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    {{-- Ganti dengan path flyer Anda --}}
                    <img src="{{ asset('assets/events/flyer1.jpg') }}" alt="Event Flyer 1" class="w-full h-auto object-cover">
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">31-10-2024</p>
                            <p class="text-gray-400">at Post 99</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="#" class="mt-4 bg-purple-600 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                            BUY TICKET
                        </a>
                    </div>
                </div>

                {{-- KARTU EVENT 2 (TEMPLATE) --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    {{-- Ganti dengan path flyer Anda --}}
                    <img src="{{ asset('assets/events/flyer2.jpg') }}" alt="Event Flyer 2" class="w-full h-auto object-cover">
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">17-12-2024</p>
                            <p class="text-gray-400">at To and Fro</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="#" class="mt-4 bg-purple-600 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                            BUY TICKET
                        </a>
                    </div>
                </div>

                {{-- KARTU EVENT 3 (TEMPLATE) --}}
                <div class="bg-zinc-900/80 rounded-2xl overflow-hidden flex flex-col">
                    {{-- Ganti dengan path flyer Anda --}}
                    <img src="{{ asset('assets/events/flyer3.jpg') }}" alt="Event Flyer 3" class="w-full h-auto object-cover">
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-lg">13-06-2025</p>
                            <p class="text-gray-400">at To and Fro</p>
                            <p class="text-gray-400">Semarang</p>
                        </div>
                        <a href="#" class="mt-4 bg-purple-600 text-white w-full py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                            BUY TICKET
                        </a>
                    </div>
                </div>
                
                {{-- Tambahkan kartu lain di sini --}}

            </div>
        </div>
    </div>
</x-app-layout>