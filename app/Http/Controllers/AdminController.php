<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman utama admin panel (dashboard).
     */
    public function index()
    {
        // Card Statistik
        $totalUsers = User::count();
        $totalOrders = Transaction::where('status_pembayaran', 'paid')->count();
        $totalRevenue = Transaction::where('status_pembayaran', 'paid')->sum('total_harga');
        $activeEvents = Event::where('is_coming_soon', false)
                             ->where('tanggal_event', '>=', now())
                             ->count();

        // Tabel Transaksi Terbaru (Recent Orders)
        $recentOrders = Transaction::with(['user', 'event'])
                                   ->orderBy('created_at', 'desc')
                                   ->limit(5)
                                   ->get();

        // Kirim semua data ke view
        return view('admin.index', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'activeEvents' => $activeEvents,
            'recentOrders' => $recentOrders,
        ]);
    }
}