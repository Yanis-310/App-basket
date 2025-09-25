<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view("conferences.index", compact("conferences"));
    }
    public function show($id)
    {
        $conference = Conference::with('teams')->findOrFail($id);
        return view('conferences.show', compact('conference'));
    }
}
