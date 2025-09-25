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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ConferenceController::class, 'index'])->name('conferences.index');
Route::get('/conference/{id}', [ConferenceController::class, 'show'])->name('conferences.show');

Route::post('/conference/{id}team', [TeamController::class, 'store'])->name('Teams.store');

Route::delete('team/{id}', [PokemonController::class, 'delete'])->name('teams.delete');
Route::get('team/{id}', [TeamController::class, 'show'])->name('show');
Route::post('team/{id}/player', [PlayerController::class, 'store'])->name('store');


