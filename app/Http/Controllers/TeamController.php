<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Ajouter une équipe
    public function store(Request $request, $conferenceId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Team::create([
            'name' => $request->name,
            'conference_id' => $conferenceId,
        ]);

        return back()->with('success', 'Équipe ajoutée avec succès.');
    }

    // Supprimer une équipe
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return back()->with('success', 'Équipe supprimée.');
    }

    // Affiche une équipe avec ses joueurs
    public function show($id)
    {
        $team = Team::with('players')->findOrFail($id);
        return view('teams.show', compact('team'));
    }
}