<x-app-layout>
    <div class="pt-32 pb-16 bg-black/60 backdrop-blur-sm min-h-screen text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-zinc-900/80 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-bold mb-4">Selesaikan Pembayaran</h3>
                
                @if($transaction)
                    <div class="text-left mb-6">
                        <p class="text-gray-400">Order ID:</p>
                        <p class="font-mono text-lg">{{ $transaction->order_id }}</p>

                        <p class="text-gray-400 mt-4">Total Tagihan:</p>
                        <p class="text-purple-400 text-3xl font-bold">Rp {{ number_format($transaction->total_harga) }}</p>
                    </div>

                    <button id="pay-button" class="w-full bg-purple-600 text-white py-3 rounded-lg text-center font-bold hover:bg-purple-700 transition-colors">
                        Bayar Sekarang
                    </button>
                @else
                    <p class="text-red-400">Informasi transaksi tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        // Pastikan tombol ada sebelum menambahkan event listener
        const payButton = document.getElementById('pay-button');
        if (payButton) {
            payButton.onclick = function(){
                // Mencegah klik ganda
                payButton.disabled = true;
                payButton.innerText = 'Memuat...';

                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result){
                        /* Implementasi Anda: Arahkan ke halaman riwayat tiket */
                        alert("Pembayaran berhasil!"); 
                        window.location.href = '/'; // Ganti ke route riwayat tiket Anda nanti
                    },
                    onPending: function(result){
                        alert("Menunggu pembayaran Anda!");
                        payButton.disabled = false;
                        payButton.innerText = 'Bayar Sekarang';
                    },
                    onError: function(result){
                        alert("Pembayaran gagal!");
                        payButton.disabled = false;
                        payButton.innerText = 'Bayar Sekarang';
                    },
                    onClose: function(){
                        alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                        payButton.disabled = false;
                        payButton.innerText = 'Bayar Sekarang';
                    }
                });
            };
        }
    </script>
    @endpush
</x-app-layout>