<?php

namespace App\Http\Controllers;

use App\Models\CocktailReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CocktailReservationController extends Controller
{
    public function index()
    {
        // Retrieve reservations ordered by newest and paginate.
        $reservations = CocktailReservation::orderBy('created_at', 'desc')->paginate(10);

        // Return the index view and pass the reservations.
        return view('cocktailReservations.cocktail-reservations', compact('reservations'));
    }

    public function create()
    {
        return view('cocktailReservations.cocktail-reservations-create');
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
        CocktailReservation::create($validated);

        // Redirect back to the index with a success message.
        return redirect()->route('cocktail.reservations')
            ->with('success', 'Резервацијата е успешно креирана!');
    }

    public function edit($id)
    {
        $reservation = CocktailReservation::findOrFail($id);
        return view('cocktailReservations.cocktail-reservations-edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = CocktailReservation::findOrFail($id);

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
        return redirect()->route('cocktail.reservations')
            ->with('success', 'Резервацијата е успешно променета!');
    }

    public function destroy($id)
    {
        $reservation = CocktailReservation::findOrFail($id);
        $reservation->delete();

        // Redirect back with a success message.
        return redirect()->route('cocktail.reservations')
            ->with('success', 'Резервацијата е успешно избришана!');
    }
}
