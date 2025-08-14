<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'date'=>'required|date',
            'location'=>'required',
            'city'=>'required',
            'type'=>'required|in:monthly,exclusive',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event created');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'=>'required',
            'date'=>'required|date',
            'location'=>'required',
            'city'=>'required',
            'type'=>'required|in:monthly,exclusive',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event updated');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted');
    }
}
