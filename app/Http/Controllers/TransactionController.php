<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function store(Request $request)
    {
        $request->validate(['id_event' => 'required|exists:events,id', 'jumlah_tiket' => 'required|integer|min:1']);
        
        $event = Event::find($request->id_event);
        if ($event->stok_tiket < $request->jumlah_tiket) {
            return redirect()->back()->with('error', 'Stok tiket tidak mencukupi.');
        }

        $orderId = 'TICKET-' . uniqid();
        $totalHarga = $request->jumlah_tiket * $event->harga_tiket;
        
        // 1. Simpan Transaksi ke DB
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'order_id' => $orderId,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $totalHarga,
        ]);

        // 2. Dapatkan Snap Token Midtrans
        $payload = [
            'transaction_details' => ['order_id' => $orderId, 'gross_amount' => $totalHarga],
            'customer_details' => ['first_name' => Auth::user()->name, 'email' => Auth::user()->email],
        ];
        $snapToken = Snap::getSnapToken($payload);
        
        // 3. Update Transaksi dengan Snap Token
        $transaction->snap_token = $snapToken;
        $transaction->save();
        
        // 4. Kirim token ke view
        return view('payment.show', compact('snapToken', 'transaction'));
    }

    public function notificationHandler(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                
                $transaction = Transaction::where('order_id', $request->order_id)->first();
                
                if ($transaction && $transaction->status_pembayaran == 'pending') {
                     DB::transaction(function () use ($transaction) {
                        // Update status pembayaran
                        $transaction->update(['status_pembayaran' => 'paid']);
                        // Kurangi stok tiket
                        $transaction->event()->decrement('stok_tiket', $transaction->jumlah_tiket);
                    });
                }
            }
        }
    }
}