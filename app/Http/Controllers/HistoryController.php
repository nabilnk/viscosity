<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config; 
use Midtrans\Snap;   

class HistoryController extends Controller
{
    /**
     * Menampilkan halaman daftar riwayat transaksi pengguna.
     */
    public function index()
    {
        // Ambil semua transaksi milik pengguna yang sedang login
        // Gunakan `with('event')` untuk eager loading agar efisien
        $transactions = Transaction::where('user_id', Auth::id())
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('history.index', compact('transactions'));
    }

    /**
     * Menampilkan detail e-ticket untuk satu transaksi.
     */

public function show($order_id)
{
    $transaction = Transaction::where('order_id', $order_id)
        ->where('user_id', Auth::id())
        ->with('event', 'user')
        ->firstOrFail();
    
    $snapToken = null;

    // JIKA transaksi masih 'pending' DAN belum punya snap_token
    if ($transaction->status_pembayaran == 'pending' && is_null($transaction->snap_token)) {
        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat Snap Token
        $payload = [
            'transaction_details' => ['order_id' => $transaction->order_id, 'gross_amount' => $transaction->total_harga],
            'customer_details' => ['first_name' => $transaction->user->name, 'email' => $transaction->user->email],
        ];
        $snapToken = Snap::getSnapToken($payload);

        // Simpan Snap Token ke database agar tidak perlu dibuat lagi
        $transaction->snap_token = $snapToken;
        $transaction->save();
    } else {
        // Jika sudah punya token, ambil saja dari database
        $snapToken = $transaction->snap_token;
    }
    
    return view('history.ticket', compact('transaction', 'snapToken'));
}
    
}