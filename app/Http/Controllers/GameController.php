<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\TeamService;
use App\Services\LeagueService;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreGameRequest;

class GameController extends Controller
{
    public function index(LeagueService $leagueService)
    {
        // We get all the games from the database, we also include soft-deleted teams and group them by matchweek.
        $games = Game::with(['league', 'homeTeam' => function ($query) {
            $query->withTrashed();
        }, 'awayTeam' => function ($query) {
            $query->withTrashed();
        }])
            ->orderBy('matchweek')
            ->get()
            ->groupBy('matchweek');
        // We'll also pass the leagues to scope the games.
        $leagues = $leagueService->getAllLeagues();
        // We return the view with the games data.
        return view('games.games', ['games' => $games, 'leagues' => $leagues]);
    }

    public function create(TeamService $teamService, LeagueService $leagueService)
    {
        // As we need the teams to select when creating a new game, we use a service to import them.
        $teams = $teamService->getAllTeams();
        // We also need the leagues to select when creating a new game.
        $leagues = $leagueService->getAllLeagues();
        // Show the create view, and then pass the $teams info from the database.
        return view('games.create', ['teams' => $teams, 'leagues' => $leagues]);
    }

    public function store(StoreGameRequest $request)
    {
        //First we validate the incoming request with the rules specified in the StoreGameRequest class.
        $data = $request->validated();
        // Create a new game with the data from the form.
        Game::create($data);
        // Redirect to the games index.
        return redirect()->route('games.index');
    }

    public function show(Game $game)
    {
        // Soon we'll show the game's details.
        return view('games.show', ['games' => $game]);
    }

    public function edit(Game $game, TeamService $teamService, LeagueService $leagueService)
    {
        // As we need the teams to select when editing a game, we use a service to import them.
        $teams = $teamService->getAllTeams();
        // And we need the leagues to select when editing a game.
        $leagues = $leagueService->getAllLeagues();
        // Edit will show the edit view with the game data, then update will be called.
        return view('games.edit', ['game' => $game, 'teams' => $teams, 'leagues' => $leagues]);
    }

    public function update(StoreGameRequest $request, Game $game)
    {
        $data = $request->validated();

        $game->update($data);

        return redirect()->route('games.index');
    }

    public function destroy(Game $game)
    {
        // ->delete() is the function associated with destroying a model instance.
        $game->delete();

        return redirect()->route('games.index');
    }
}
