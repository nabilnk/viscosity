<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk menghapus gambar

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('status')) {
            if ($request->status == 'published') {
                $query->where('is_coming_soon', false);
            } elseif ($request->status == 'coming_soon') {
                $query->where('is_coming_soon', true);
            }
        }
        if ($request->filled('period')) {
            if ($request->period == 'upcoming') {
                $query->where('tanggal_event', '>=', now());
            } elseif ($request->period == 'past') {
                $query->where('tanggal_event', '<', now());
            }
        }
        $events = $query->orderBy('tanggal_event', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string',
            'city' => 'required|string',
            'date' => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'type' => 'required|in:monthly,exclusive',
            'price' => 'required|integer|min:0',
            'is_published' => 'required|boolean',
        ]);

        $eventData = [
            'nama_event' => $data['title'],
            'tanggal_event' => $data['date'],
            'lokasi' => $data['location'] . ', ' . $data['city'],
            'harga_tiket' => $data['price'],
            'stok_tiket' => 999,
            'is_coming_soon' => !$data['is_published'],
            'type' => $data['type'], // <-- PERBAIKAN: Komentar dihapus
        ];

        if ($request->hasFile('flyer_image')) {
            $path = $request->file('flyer_image')->store('public/events');
            $eventData['gambar'] = basename($path);
        }
        
        Event::create($eventData);

        return redirect()->route('admin.events.index')->with('success', 'Event baru berhasil dibuat.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string',
            'city' => 'required|string',
            'date' => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'type' => 'required|in:monthly,exclusive',
            'price' => 'required|integer|min:0',
            'is_published' => 'required|boolean',
        ]);

        $eventData = [
            'nama_event' => $data['title'],
            'tanggal_event' => $data['date'],
            'lokasi' => $data['location'] . ', ' . $data['city'],
            'harga_tiket' => $data['price'],
            'is_coming_soon' => !$data['is_published'],
            'type' => $data['type'], // <-- PERBAIKAN: Komentar dihapus
        ];

        if ($request->hasFile('flyer_image')) {
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($event->gambar && $event->gambar != 'default_event.jpg') {
                 Storage::delete('public/events/' . $event->gambar);
            }
            $path = $request->file('flyer_image')->store('public/events');
            $eventData['gambar'] = basename($path);
        }

        $event->update($eventData);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->gambar && $event->gambar != 'default_event.jpg') {
            Storage::delete('public/events/' . $event->gambar);
        }
        
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}