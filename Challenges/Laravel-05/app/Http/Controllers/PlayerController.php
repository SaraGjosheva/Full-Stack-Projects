<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('team')->paginate(10);
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::pluck('name', 'id');
        return view('players.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'before:' . now()->subYears(18)->toDateString()],
            'team_id'       => ['required', 'exists:teams,id'],
        ]);

        Player::create($data);

        return redirect()->route('players.index')
            ->with('success', 'Player created successfully.');
    }

    public function edit(Player $player)
    {
        $teams = Team::pluck('name', 'id');
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $data = $request->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'before:' . now()->subYears(18)->toDateString()],
            'team_id'       => ['required', 'exists:teams,id'],
        ]);

        $player->update($data);

        return redirect()->route('players.index')
            ->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')
            ->with('success', 'Player deleted successfully.');
    }
}
