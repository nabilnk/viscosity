<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Menampilkan halaman Home.
     */
    public function home()
    {
        // Nantinya, data dinamis bisa dikirim dari sini
        // Untuk sekarang, kita hanya menampilkan view statis
        return view('pages.home');
    }

    // Method untuk halaman lain akan ditambahkan di sini nanti
    public function eventMonthly()
    {
        return view('pages.event.monthly');
    }

    // Method untuk halaman Event Exclusive
    public function eventExclusive()
    {
        return view('pages.event.exclusive');
    }

    public function talent() {
        return view('pages.talent');
    }
    public function vvip()
    {
        // Data statis untuk contoh
        $currentSpending = 1500000;
        $targetSpending = 10000000;
        $progressPercentage = ($currentSpending / $targetSpending) * 100;

        return view('pages.vvip', [
            'currentSpending' => $currentSpending,
            'targetSpending' => $targetSpending,
            'progressPercentage' => $progressPercentage,
        ]);
    }
    public function nofreq() {
        // Logika untuk halaman nofreq
    }
}