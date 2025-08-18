<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Setting;
use App\Models\AssetHome;
use App\Models\Talent;
use App\Models\Nofreq;
use App\Models\VVIPSetting; 

class PageController extends Controller
{
    /**
     * Menampilkan halaman Home.
     */
    public function home()
    {
        // Ambil semua aset dari database dan kelompokkan berdasarkan tipenya
        $assets = AssetHome::all()->groupBy('type');

        // Siapkan data untuk dikirim ke view
        $data = [
            'trackRecords' => $assets->get('track_record', collect()),
            'documentations' => $assets->get('documentation', collect()),
            'teams' => $assets->get('team', collect()),
            'collaborations' => $assets->get('collaboration', collect()),
        ];

        return view('pages.home', $data);
    }

    // Method untuk halaman lain akan ditambahkan di sini nanti
    public function eventMonthly()
    {
        // Data WhatsApp dari Anda
        $waNumber = '6282328591635';

        $events = Event::where('type', 'monthly')       // HANYA ambil event tipe 'monthly'
            ->where('is_coming_soon', false) // HANYA ambil yang statusnya 'Published'
            ->where('tanggal_event', '>=', now()) // HANYA ambil event yang akan datang
            ->orderBy('tanggal_event', 'asc')     // Urutkan dari yang paling dekat
            ->get();

        // Kirim data event dan nomor WA ke view
        return view('pages.event.monthly', compact('events', 'waNumber')); // Pastikan path view sudah benar
    }

    
    public function eventExclusive()
    {
        // Cek status "Coming Soon" dari database
        $isComingSoon = Setting::find('exclusive_coming_soon')->value ?? 'false';

        // JIKA COMING SOON AKTIF, tampilkan view khusus
        if ($isComingSoon === 'true') {
            return view('pages.event.coming-soon'); // Buat view ini
        }

        // Jika tidak, jalankan logika seperti biasa
        $events = Event::where('type', 'exclusive')
            ->where('is_coming_soon', false)
            ->where('tanggal_event', '>=', now())
            ->orderBy('tanggal_event', 'asc')
            ->get();
            
        return view('pages.event.exclusive', compact('events'));
    }
    
    /**
     * Menampilkan halaman detail untuk satu event.
     */
    public function eventDetail(Event $event)
    {
        // Keamanan: Pastikan event yang diakses tidak coming soon dan tipenya exclusive
        if ($event->is_coming_soon || $event->type !== 'exclusive') {
            abort(404, 'Event not found');
        }
        
        // Sesuaikan nama view jika berbeda.
        return view('pages.event.event-detail', compact('event'));
    }

    public function talent() 
    {
        $talents = Talent::all();
        return view('pages.talent', compact('talents'));
    }

    public function vvip() 
    {
        $setting = VVIPSetting::first();
        
        // Cek apakah halaman VVIP aktif
        if (!$setting || !$setting->is_active) {
            return view('pages.coming-soon', ['pageName' => 'VVIP']); // Gunakan view coming-soon generik
        }

        // Jika aktif, tampilkan halaman VVIP (logika progress bar dihapus sementara)
        return view('pages.vvip');
    }

    public function nofreq() 
    {
        $nofreqs = Nofreq::all();
        // Proses link YouTube untuk mendapatkan ID dan thumbnail
        $videos = $nofreqs->map(function($item) {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $item->youtube_link, $matches);
            $youtubeId = $matches[1] ?? null;
            return [
                'title' => $item->title,
                'thumbnail' => $youtubeId ? "https://i.ytimg.com/vi/{$youtubeId}/hqdefault.jpg" : '',
                'youtube_id' => $youtubeId,
            ];
        });
        return view('pages.nofreq', compact('videos'));
    }
        

}