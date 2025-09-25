<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request, $teamId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:50',
        ]);

        Player::create([
            'name' => $request->name,
            'position' => $request->position,
            'team_id' => $teamId,
        ]);

        return back()->with('success', 'Joueur ajouté.');
    }
}
