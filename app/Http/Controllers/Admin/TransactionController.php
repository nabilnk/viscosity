<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar semua transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'event']) // Mengambil relasi untuk efisiensi
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Men-download invoice PDF untuk transaksi tertentu.
     */
    public function downloadInvoice($order_id)
    {
        $transaction = Transaction::where('order_id', $order_id)->firstOrFail();
        
        $dompdf = new Dompdf();
        
        // Memuat view Blade sebagai HTML, mengirimkan data transaksi
        $html = view('invoices.pdf', compact('transaction'))->render();
        $dompdf->loadHtml($html);
        
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Kirim PDF ke browser untuk di-download
        return $dompdf->stream("Invoice-" . $transaction->order_id . ".pdf");
    }
}