<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;

class EventController extends Controller
{

    public function index3()
    {
        return EventResource::collection(Event::latest()->get());
    }

    public function index2()
    {
        try {
            $events = Event::all();

            return response()->json([
                'status' => 200,
                'data' => $events,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'data' => []
            ]);
        }
    }

    public function index()
    {
        try {
            $events = Event::all();
            return EventResource::collection($events);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to load events.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
