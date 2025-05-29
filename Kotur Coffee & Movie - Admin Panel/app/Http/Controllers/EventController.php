<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    // Show create event form
    public function create()
    {
        return view('events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|url',
        ]);

        $event = Event::create($request->only(['name', 'date', 'time', 'description', 'image']));

        Gallery::create([
            'event_id' => $event->id,
            'image' => $event->image,
        ]);

        return redirect()->route('events.index')->with('success', 'Настан успешно креиран!');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Show edit form
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|url',
        ]);

        $event->update($request->only(['name', 'date', 'time', 'description', 'image']));

        return redirect()->route('events.index')->with('success', 'Настан успешно променет!');
    }

    // Delete an event
    public function destroy($id)
    {
        Gallery::where('event_id', $id)->delete();

        Event::destroy($id);

        return redirect()->route('events.index')->with('success', 'Настан успешно избришан!');
    }
}
