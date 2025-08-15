<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->input('type');
        $events = Event::when($type, fn($query, $type) => $query->where('type', $type))->get();

        // baca status dari DB (default = false)
        $isComingSoon = \App\Models\Setting::get('exclusive_coming_soon', false);

        return view('admin.events.index', compact('events', 'type', 'isComingSoon'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date' => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:monthly,exclusive',
            'is_published' => 'required|boolean',
        ]);

         // Proses upload gambar (jika ada)
          $path = null; // Inisialisasi $path

          if ($request->hasFile('flyer_image')) {
              $path = Storage::disk('public')->put('events', $request->file('flyer_image'));
          }

          $event = new Event($request->except('flyer_image')); // Create Event
           // Simpan data dan atur kolom is_published
           $event->flyer_image = $path;
            $event->is_published = $request->has('is_published'); // Mengatur nilai is_published berdasarkan checkbox
        $event->save();

          return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date' => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:monthly,exclusive',
            'is_published' => 'required|boolean',
        ]);

        // Proses upload gambar (jika ada)
        if ($request->hasFile('flyer_image')) {
            // Hapus gambar lama (jika ada)
            if ($event->flyer_image) {
                Storage::disk('public')->delete($event->flyer_image);
            }
             $path = Storage::disk('public')->put('events', $request->file('flyer_image'));
              $event->flyer_image = $path;
        }

          // update is_published
        $event->is_published = $request->has('is_published');

        $event->update($request->except('flyer_image'));

        $event->save();
        return redirect()->route('admin.events.index')->with('success', 'Talent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->flyer_image) {
            Storage::disk('public')->delete($event->flyer_image);
        }

        $event->delete();

          return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function toggleComingSoon(Request $request)
    {
        // ambil dari checkbox, kalau ada berarti true, kalau nggak berarti false
        $value = $request->has('is_coming_soon');

        // simpan ke tabel settings
        \App\Models\Setting::set('exclusive_coming_soon', $value ? 1 : 0);

        return back()->with('success', 'Coming Soon mode updated!');
    }


}