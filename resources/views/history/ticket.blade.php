<x-app-layout>
    <div class="pt-24 bg-black/60 backdrop-blur-sm min-h-screen">
        <div class="container mx-auto px-4 py-16">

            <!-- E-Ticket Card -->
            <div class="max-w-2xl mx-auto bg-zinc-900/80 rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-cover bg-center h-48" style="background-image: url('{{ asset('storage/events/' . $transaction->event->gambar) }}')"></div>
                
                <div class="p-8">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-purple-400 uppercase tracking-widest">E-TICKET</p>
                            <h1 class="text-3xl font-bold text-white mt-1">{{ $transaction->event->nama_event }}</h1>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Order ID</p>
                            <p class="font-mono text-white">{{ $transaction->order_id }}</p>
                        </div>
                    </div>

                    <hr class="border-gray-700 my-6">

                    <!-- ... (detail nama, jumlah, tanggal, lokasi tetap sama) ... -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                        <div><p class="text-sm text-gray-400">Nama</p><p class="font-semibold text-lg">{{ $transaction->user->name }}</p></div>
                        <div><p class="text-sm text-gray-400">Jumlah Tiket</p><p class="font-semibold text-lg">{{ $transaction->jumlah_tiket }}</p></div>
                        <div><p class="text-sm text-gray-400">Tanggal & Waktu</p><p class="font-semibold text-lg">{{ \Carbon\Carbon::parse($transaction->event->tanggal_event)->format('l, d F Y - H:i') }} WIB</p></div>
                        <div><p class="text-sm text-gray-400">Lokasi</p><p class="font-semibold text-lg">{{ $transaction->event->lokasi }}</p></div>
                    </div>
                    
                    <!-- BAGIAN DINAMIS: QR CODE atau TOMBOL BAYAR -->
                    <div class="mt-8 text-center">
                        @if ($transaction->status_pembayaran == 'paid')
                            <!-- JIKA LUNAS: Tampilkan QR Code -->
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $transaction->order_id }}" alt="QR Code" class="bg-white p-2 rounded-lg inline-block">
                            <p class="text-center text-gray-500 text-xs mt-2">Tunjukkan QR Code ini di pintu masuk</p>
                        @else
                            <!-- JIKA PENDING: Tampilkan Tombol Bayar -->
                            <div class="bg-yellow-900/50 border border-yellow-500 rounded-lg p-4">
                                <p class="font-bold text-yellow-300 mb-2">Pembayaran Tertunda</p>
                                <p class="text-sm text-yellow-400 mb-4">Selesaikan pembayaran Anda untuk mendapatkan E-Ticket.</p>
                                <button id="pay-button" class="w-full bg-purple-600 text-white py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                                    Bayar Sekarang (Rp {{ number_format($transaction->total_harga) }})
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

             <div class="text-center mt-8">
                <a href="{{ route('history.index') }}" class="text-purple-400 hover:text-purple-300">&larr; Kembali ke Riwayat</a>
            </div>

        </div>
    </div>

    @push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        if (payButton) {
            payButton.onclick = function(){
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result){ window.location.href = '{{ route("history.index") }}'; },
                    onPending: function(result){ alert("Menunggu pembayaran Anda!"); },
                    onError: function(result){ alert("Pembayaran gagal!"); },
                    onClose: function(){ alert('Anda menutup popup tanpa menyelesaikan pembayaran'); }
                });
            };
        }
    </script>
    @endpush
</x-app-layout>