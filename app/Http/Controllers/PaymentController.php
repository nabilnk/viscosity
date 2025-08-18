<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Transaction;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    public function checkout(Request $request, $eventId)
    {
        // Find Event by Id
         $user = Auth::user();
            if (!$user) {
               return redirect()->route('login')->with('error', 'You must be logged in to buy a ticket.');
            }
        $event = Event::findOrFail($eventId);

        // Set Midtrans Configuration
       \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set snapis_production (false) for the sandbox environment
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        //Generate Order ID
        $orderId = Str::uuid();

        // Create Transaction to Database
        $transaction = Transaction::create([
            'user_id' => Auth::id(), // Assumsikan user sudah login
            'event_id' => $event->id,
            'order_id' => $orderId,
            'gross_amount' => $event->price,
        ]);

       $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $event->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => '081122334455', // Ganti dgn nomor telp user jika ada
            ),
        );

        // Get Snap Token
         $snapToken = Snap::getSnapToken($params);

        return view('pages.event.pay', [
            'snapToken' => $snapToken,
            'event' => $event
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashedSignature = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashedSignature == $request->signature_key) {
            Log::info('Verifikasi berhasil: ' . $request->order_id); // Log jika verifikasi berhasil
            $transaction = Transaction::where('order_id', $request->order_id)->first();

            if ($transaction) {
                $transaction->payment_type = $request->payment_type; // Mengisi payment_type

                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $transaction->payment_status = 'berhasil'; // Menggunakan 'berhasil'
                } elseif ($request->transaction_status == 'pending') {
                    $transaction->payment_status = 'pending'; // Menggunakan 'pending'
                } else {
                    $transaction->payment_status = 'gagal'; // Menggunakan 'gagal'
                }

                $transaction->save(); // Simpan perubahan

                Log::info('Status pembayaran diubah: ' . $transaction->payment_status . ' untuk order ID: ' . $request->order_id); // Log perubahan status
            } else {
                Log::error('Transaksi tidak ditemukan untuk order ID: ' . $request->order_id);
            }
        } else {
            Log::error('Signature Key tidak cocok: ' . $request->order_id);
        }

        return; // Midtrans membutuhkan response 200 OK, tanpa konten
    }
}