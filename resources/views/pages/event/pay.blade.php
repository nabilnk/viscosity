<x-guest-layout>
    <div class="container">
    <h1>Beli Tiket Event Exclusive: {{ $event->title }}</h1>
    <p>Harga Tiket: Rp {{ number_format($event->price, 0, ',', '.') }}</p>

    <button id="pay-button">Bayar Sekarang</button>
    </div>
      {{-- Code ini yang nantinya akan membuat interaksi ke midtrans --}}
    <script type="text/javascript">
      // For example trigger on button click, or similar event:
      const payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function(event) {
        event.preventDefault();

        snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
</x-guest-layout>