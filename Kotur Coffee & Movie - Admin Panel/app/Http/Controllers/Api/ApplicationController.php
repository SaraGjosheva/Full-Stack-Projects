<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Mail\CinemaReservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function cinemaApplication(Request $request)
    {
        $request->validate([
            'full_name' => 'required'
        ]);

        $reservation = CinemaReservation::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'event_type' => $request->event_type,
            'message' => $request->message ?? '/',
            'reservation_date' => $request->reservation_date,
            'reservation_hour' => $request->reservation_hour
        ]);

        Mail::to('andrej@hotmail.com')->send(new CinemaReservation($reservation));

        return response()->json([
            'status' => 200,
            'data' => null
        ]);
    }

    public function cocktailApplication() {}

    public function jobApplication() {}
}
