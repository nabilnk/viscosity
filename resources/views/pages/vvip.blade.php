<x-app-layout>
    {{-- Background Layer --}}
    <div class="fixed inset-0 z-[-1] grayscale">
        {{-- GANTI DENGAN GAMBAR BACKGROUND VVIP ANDA --}}
        <img src="{{ asset('assets/vvip/vvip-bg.png') }}" class="w-full h-full object-cover" alt="VVIP Background">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>
    
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center text-white p-4">

        {{-- Logo Viscosity --}}
        <img src="{{ asset('assets/logo/viscosity-text.png') }}" alt="Viscosity Logo" class="w-2/3 sm:w-1/2 md:w-1/3 mb-16">

        {{-- Konten Utama: Rules & Benefit --}}
        <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            
            {{-- KOTAK RULES --}}
            <div class="bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-8">
                <h2 class="text-3xl font-bold mb-6 text-center md:text-left">RULES</h2>
                <ul class="space-y-4 list-disc list-inside">
                    <li>Membership hanya berlaku untuk akun yang terdaftar.</li>
                    <li>Keanggotaan tidak dapat dipindahtangankan.</li>
                    <li>Peraturan dapat berubah sewaktu-waktu tanpa pemberitahuan.</li>
                    <li>Setiap pelanggaran akan mengakibatkan pencabutan status VVIP.</li>
                    <li>Keputusan admin bersifat mutlak dan tidak dapat diganggu gugat.</li>
                </ul>
            </div>

            {{-- KOTAK BENEFIT --}}
            <div class="bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-8">
                <h2 class="text-3xl font-bold mb-6 text-center md:text-left">BENEFIT</h2>
                <ul class="space-y-4 list-disc list-inside">
                    <li>Akses prioritas ke event dan promo khusus VVIP.</li>
                    <li>Diskon eksklusif untuk produk tertentu.</li>
                    <li>Customer service khusus VVIP.</li>
                    <li>Hadiah spesial di momen tertentu.</li>
                    <li>Undangan ke acara private Viscosity.</li>
                </ul>
            </div>

        </div>

        {{-- Konten Bawah: Achievement --}}
        <div class="w-full max-w-5xl mx-auto bg-black/40 backdrop-blur-md border border-gray-700/50 rounded-2xl p-8">
            <h2 class="text-3xl font-bold mb-4">ACHIEVEMENT</h2>
            <div class="flex justify-between items-end mb-2 text-gray-300">
                <span class="font-semibold">Your Spending</span>
                <span>Rp {{ number_format($currentSpending, 0, ',', '.') }} / Rp {{ number_format($targetSpending, 0, ',', '.') }}</span>
            </div>
            
            {{-- Progress Bar --}}
            <div class="w-full bg-gray-700 rounded-full h-2.5">
                <div class="bg-red-600 h-2.5 rounded-full" style="width: {{ $progressPercentage }}%"></div>
            </div>
        </div>
        
    </div>
</x-app-layout>
