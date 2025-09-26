<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function store(Request $request, $conferenceId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'history' => 'nullable|string',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Team::create([
            'name' => $request->name,
            'conference_id' => $conferenceId,
            'history' => $validated['history'] ?? null,
            'logo' => $logoPath,
        ]);

        return back()->with('success', 'Équipe ajoutée avec succès.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        // Supprimer aussi le logo si présent
        if ($team->logo && Storage::disk('public')->exists($team->logo)) {
            Storage::disk('public')->delete($team->logo);
        }

        $conferenceId = $team->conference_id;
        $team->delete();

        return redirect()->route('conferences.show', $conferenceId)->with('success', 'Équipe supprimée.');
    }

    public function show($id)
    {
        $team = Team::with('players')->findOrFail($id);
        return view('teams.show', compact('team'));
    }
}
