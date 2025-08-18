<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{


    /**
     * 1. List Event (Monthly / Exclusive)
     */
    public function index(Request $request)
    {
        $type   = $request->input('type');
        $events = Event::when($type, fn($q) => $q->where('type', $type))->get();

        $isComingSoon = Setting::get('exclusive_coming_soon', false);

        return view('admin.events.index', compact('events', 'type', 'isComingSoon'));
    }

    /**
     * 2. Create Event
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * 3. Store Event
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'location'    => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:255',
            'date'        => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type'        => 'required|in:monthly,exclusive',
            'price'       => 'nullable|integer',
            'is_published'=> 'boolean',
        ]);

        $path = $request->hasFile('flyer_image')
            ? $request->file('flyer_image')->store('events', 'public')
            : null;

        $event              = new Event($request->except('flyer_image'));
        $event->flyer_image = $path;
        $event->is_published = $request->boolean('is_published');
        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    /**
     * 4. Edit Event
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * 5. Update Event
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'location'    => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:255',
            'date'        => 'required|date',
            'flyer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type'        => 'required|in:monthly,exclusive',
            'price'       => 'nullable|integer',
            'is_published'=> 'boolean',
        ]);

        if ($request->hasFile('flyer_image')) {
            if ($event->flyer_image) {
                Storage::disk('public')->delete($event->flyer_image);
            }
            $event->flyer_image = $request->file('flyer_image')->store('events', 'public');
        }

        $event->fill($request->except('flyer_image'));
        $event->is_published = $request->boolean('is_published');
        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * 6. Delete Event
     */
    public function destroy(Event $event)
    {
        if ($event->flyer_image) {
            Storage::disk('public')->delete($event->flyer_image);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    /**
     * 7. Toggle Coming Soon untuk Exclusive
     */
    public function toggleComingSoon(Request $request)
    {
        $value = $request->boolean('is_coming_soon');
        Setting::set('exclusive_coming_soon', $value ? 1 : 0);

        return back()->with('success', 'Coming Soon mode updated!');
    }


}
