<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $events = Event::with('gallery')->get();
        return view('gallery.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $page = request()->get('page', 1);

        $gallery = $event->gallery()->skip(1)->paginate(4);

        $firstImage = $event->gallery()->inRandomOrder()->first();
        $images = $event->gallery;

        return view('gallery.gallery', compact('event', 'gallery', 'images', 'firstImage', 'page'));
    }



    public function add(Event $event)
    {
        return view('gallery.upload', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'image' => 'required|url',
        ]);

        $imageUrl = $request->input('image');

        $event->gallery()->create([
            'image' => $imageUrl,
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('gallery.show', $event->id)
            ->with('success', 'Сликата е успешно додадена!');
    }



        public function create()
        {
            $eventsWithGalleries = Gallery::pluck('event_id')->unique();

            $events = Event::whereNotIn('id', $eventsWithGalleries)->get();

            return view('gallery.create', compact('events'));
        }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'image' => 'required|url',
        ]);

        Gallery::create([
            'event_id' => $request->event_id,
            'image' => $request->image,
        ]);

        return redirect()->route('gallery')->with('success', 'Галеријата е успешно додадена.');
    }


    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);
        if (file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        return redirect()->route('gallery.show', $image->event_id)->with('success', 'Сликата е успешно избришана!');
    }
}
