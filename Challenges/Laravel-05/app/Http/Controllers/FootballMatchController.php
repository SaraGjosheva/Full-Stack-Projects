<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\FootballMatch;

class FootballMatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::with(['homeTeam', 'awayTeam'])
            ->orderBy('scheduled_at', 'desc')
            ->paginate(10);

        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::pluck('name', 'id');
        return view('matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'home_team_id'   => ['required', 'exists:teams,id', 'different:away_team_id'],
            'away_team_id'   => ['required', 'exists:teams,id'],
            'scheduled_at'   => ['required', 'date'],
        ]);

        FootballMatch::create($data);

        return redirect()->route('matches.index')
            ->with('success', 'Football Match scheduled successfully.');
    }

    public function edit(FootballMatch $match)
    {
        $teams = Team::pluck('name', 'id');
        return view('matches.edit', compact('match', 'teams'));
    }

    public function update(Request $request, FootballMatch $match)
    {
        $data = $request->validate([
            'home_team_id'   => ['required', 'exists:teams,id', 'different:away_team_id'],
            'away_team_id'   => ['required', 'exists:teams,id'],
            'scheduled_at'   => ['required', 'date'],
            'home_score'     => ['nullable', 'integer', 'min:0'],
            'away_score'     => ['nullable', 'integer', 'min:0'],
        ]);

        $match->update($data);

        return redirect()->route('matches.index')
            ->with('success', 'Football Match updated successfully.');
    }

    public function destroy(FootballMatch $match)
    {
        $match->delete();

        return redirect()->route('matches.index')
            ->with('success', 'Football Match deleted successfully.');
    }
}
