<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeagueController;


/* IMPORTANT: Laravel interprets routes from top to bottom. When it sees for example teams/{team}, 
{team} is the id and if this route is before teams/create, it will iterpret "create" as a team ID
and tries to match it to the teams/{team} route. So specific routes should be before.*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for the select-league form, to store the league_id in the session.
Route::post('/select-league', [LeagueController::class, 'selectLeague'])->name('select-league');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Added two routes to recover the teams of a league that have been deleted.
    Route::get('teams/deleted', [TeamsController::class, 'showDeleted'])->name('teams.deleted');
    Route::put('teams/{team}/restore', [TeamsController::class, 'restore'])->name('teams.restore');

    // TEAMS:
    Route::get('teams/create', [TeamsController::class, 'create'])->name('teams.create');
    Route::post('teams', [TeamsController::class, 'store'])->name('teams.store');
    Route::get('teams/{team}/edit', [TeamsController::class, 'edit'])->name('teams.edit');
    Route::put('teams/{team}', [TeamsController::class, 'update'])->name('teams.update');
    Route::delete('teams/{team}', [TeamsController::class, 'destroy'])->name('teams.destroy');

    // GAMES:
    Route::get('games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('games', [GameController::class, 'store'])->name('games.store');
    Route::get('games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::put('games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::delete('games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

    // LEAGUES:
    Route::get('leagues/create', [LeagueController::class, 'create'])->name('leagues.create');
    Route::post('leagues', [LeagueController::class, 'store'])->name('leagues.store');
    Route::get('leagues/{league}/edit', [LeagueController::class, 'edit'])->name('leagues.edit');
    Route::put('leagues/{league}', [LeagueController::class, 'update'])->name('leagues.update');
    Route::delete('leagues/{league}', [LeagueController::class, 'destroy'])->name('leagues.destroy');
});

Route::get('teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('teams/{team}', [TeamsController::class, 'show'])->name('teams.show');
Route::get('games', [GameController::class, 'index'])->name('games.index');
Route::get('games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('leagues', [LeagueController::class, 'index'])->name('leagues.index');
Route::get('leagues/{league}', [LeagueController::class, 'show'])->name('leagues.show');

// Added the auth routes to the web.php file.
require __DIR__ . '/auth.php';
