<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conference = Conference::all();
        return view("conferences.index", compact("conferences"));
    }
    public function show($id)
    {
        $conference = Conference::with('teams')->findOrFail($id);
        return view('conferences.show', compact('conference'));
    }
}
