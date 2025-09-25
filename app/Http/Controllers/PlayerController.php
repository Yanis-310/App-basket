<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player; // <-- Très important !

class PlayerController extends Controller
{
    public function store(Request $request, $teamId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        Player::create([
            'name' => $request->name,
            'position' => $request->position,
            'team_id' => $teamId,
        ]);

        return back()->with('success', 'Joueur ajouté avec succès.');
    }

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $conferenceId = $player->team->conference_id; // pour rediriger vers la bonne conf
        $player->delete();

        return redirect()->route('conferences.show', $conferenceId)
            ->with('success', 'Joueur supprimé avec succès.');
    }

}

