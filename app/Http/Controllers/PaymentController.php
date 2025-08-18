<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction; // Ubah dari Ticket ke Transaction
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Mail; // Tambahkan ini
use App\Mail\InvoiceEmail; // Tambahkan ini
class PaymentController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Fungsi ini dipanggil saat user menekan "Beli Tiket"
    public function checkout(Request $request, Event $event)
    {
        // Validasi jumlah tiket
        $request->validate(['jumlah_tiket' => 'required|integer|min:1']);
        
        if ($event->stok_tiket < $request->jumlah_tiket) {
            return redirect()->back()->with('error', 'Stok tiket tidak mencukupi.');
        }

        // Buat transaksi di database
        $orderId = 'VSCSTY-' . uniqid();
        $totalHarga = $request->jumlah_tiket * $event->harga_tiket;
        
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'order_id' => $orderId,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $totalHarga,
            'status_pembayaran' => 'pending',
        ]);

        return redirect()->route('ticket.show', $transaction->order_id);
    }

    // Fungsi ini dipanggil oleh server Midtrans (Webhook)
    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
         if ($hashed == $request->signature_key) {
        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $transaction = Transaction::where('order_id', $request->order_id)->first();
            if ($transaction && $transaction->status_pembayaran == 'pending') {
                 DB::transaction(function () use ($transaction) {
                    // 1. Update status
                    $transaction->update(['status_pembayaran' => 'paid']);
                    // 2. Kurangi stok
                    $transaction->event->decrement('stok_tiket', $transaction->jumlah_tiket);

                    // 3. KIRIM EMAIL INVOICE KE USER
                    Mail::to($transaction->user->email)->send(new InvoiceEmail($transaction));
                    });
                }
            }
        }
    }
}