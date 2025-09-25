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

// Page d'accueil : liste des conférences
Route::get('/', [ConferenceController::class, 'index'])->name('conferences.index');

// Voir une conférence et ses équipes
Route::get('/conference/{id}', [ConferenceController::class, 'show'])->name('conferences.show');

// Équipes
Route::post('/conference/{id}/teams', [TeamController::class, 'store'])->name('teams.store'); // Ajouter une équipe
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');     // Supprimer une équipe
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');              // Voir une équipe (optionnel)

// Joueurs
Route::post('/teams/{id}/players', [PlayerController::class, 'store'])->name('players.store'); // Ajouter un joueur
Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy'); // Supprimer un joueur (optionnel)
