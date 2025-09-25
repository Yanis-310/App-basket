<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici sont définies toutes les routes web de ton application.
|
*/


Route::get('/', [ConferenceController::class, 'index'])->name('conferences.index');


Route::get('/conference/{id}', [ConferenceController::class, 'show'])->name('conferences.show');

// Équipes
Route::post('/conference/{id}/teams', [TeamController::class, 'store'])->name('teams.store');
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');


Route::post('/teams/{id}/players', [PlayerController::class, 'store'])->name('players.store');
Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');

