<?php

namespace App\Http\Controllers;

use App\Models\CinemaReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CinemaReservationController extends Controller
{
    public function index()
    {
        // Retrieve reservations ordered by newest and paginate.
        $reservations = CinemaReservation::orderBy('created_at', 'desc')->paginate(10);

        // Return the index view and pass the reservations.
        return view('cinemaReservations.cinema-reservations', compact('reservations'));
    }


    public function create()
    {
        return view('cinemaReservations.cinema-reservations-create');
    }

    public function store(Request $request)
    {
        // Validate the request input.
        $validated = $request->validate([
            'full_name'         => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'event_type'        => 'required|string|max:255',
            'message'           => 'required|string',
            'reservation_date'  => 'required|date',
            'reservation_hour'  => 'required|date_format:H:i',
        ]);

        // Create the reservation record.
        CinemaReservation::create($validated);

        // Redirect back to the index with a success message.
        return redirect()->route('cinema.reservations')
            ->with('success', 'Резервацијата е успешно креирана!');
    }

    public function edit($id)
    {
        $reservation = CinemaReservation::findOrFail($id);
        return view('cinemaReservations.cinema-reservations-edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = CinemaReservation::findOrFail($id);

        // Validate the request input.
        $validated = $request->validate([
            'full_name'         => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'event_type'        => 'required|string|max:255',
            'message'           => 'required|string',
            'reservation_date'  => 'required|date',
            'reservation_hour'  => 'required|date_format:H:i',
        ]);

        // Update the reservation record.
        $reservation->update($validated);

        // Redirect back to the index with a success message.
        return redirect()->route('cinema.reservations')
            ->with('success', 'Резервацијата е успешно променета!');
    }

    public function destroy($id)
    {
        $reservation = CinemaReservation::findOrFail($id);
        $reservation->delete();

        // Redirect back with a success message.
        return redirect()->route('cinema.reservations')
            ->with('success', 'Резервацијата е успешно избришана!');
    }
}
