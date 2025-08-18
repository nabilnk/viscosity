<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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

    
    public function eventExclusive(Request $request)
    {
        $type = $request->input('type');

        $events = Event::when($type, function ($query, $type) {
            $query->where('type', $type);
        })->get();

        // Kirim data event dan type ke view
        return view('pages.event.exclusive', compact('events', 'type'));
    }

    public function talent() 
    {
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

    public function nofreq() 
    {
        $videos = [
            [
                'title' => 'Live Set 1',
                'thumbnail' => 'https://i.ytimg.com/vi/your_youtube_video_id_1/mqdefault.jpg', // Ganti
                'youtube_id' => 'your_youtube_video_id_1' // Ganti
            ],
            [
                'title' => 'Live Set 2',
                'thumbnail' => 'https://i.ytimg.com/vi/your_youtube_video_id_2/mqdefault.jpg', // Ganti
                'youtube_id' => 'your_youtube_video_id_2' // Ganti
            ],
            [
                'title' => 'Live Set 3',
                'thumbnail' => 'https://i.ytimg.com/vi/your_youtube_video_id_3/mqdefault.jpg', // Ganti
                'youtube_id' => 'your_youtube_video_id_3' // Ganti
            ],
            [
                'title' => 'Live Set 4',
                'thumbnail' => 'https://i.ytimg.com/vi/your_youtube_video_id_4/mqdefault.jpg', // Ganti
                'youtube_id' => 'your_youtube_video_id_4' // Ganti
            ],
        ];

        return view('pages.nofreq', [
            'videos' => $videos,
        ]);
    
    }

    

}