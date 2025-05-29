<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CocktailReservation;
use App\Http\Controllers\Controller;

class CocktailReservationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'event_type' => 'required|string|max:255',
                'message' => 'required|string',
                'reservation_date' => 'required|date',
                'reservation_hour' => 'required|date_format:H:i',
            ]);

            CocktailReservation::create($validated);

            return response()->json(['success' => true, 'message' => 'Резервација успешно креирана.'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error submitting reservation.',
                'error' => app()->isLocal() ? $e->getMessage() : 'Please try again later.'
            ], 500);
        }
    }
}
