<?php

namespace App\Http\Controllers;

use App\Models\League;
// use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreLeagueRequest;
use App\Http\Requests\SelectLeagueRequest;

class LeagueController extends Controller
{
    public function index()
    {
        $leagues = League::paginate(10);

        return view('leagues.leagues', ['leagues' => $leagues]);
    }

    public function create()
    {
        return view('leagues.create');
    }

    public function store(StoreLeagueRequest $request)
    {
        // ->validated() will validate the incoming request with the rules specified in the StoreLeagueRequest class.
        $data = $request->validated();

        // Create a new team with the data from the form.
        League::create($data);

        return redirect()->route('leagues.index');
    }

    public function show(League $league)
    {
        // We'll use the level to show the league description in the view.
        $level = $league->level;
        $levelDescription = match ($level) {
            1 => 'First Division',
            2 => 'Second Division',
            3 => 'Third Division',
            4 => 'Fourth Division',
            5 => 'Fifth Division',
            6 => 'Sixth Division',
            default => 'Unknown',
        };

        // Soon we'll show the league details.
        return view('leagues.show', ['league' => $league], ['levelDescription' => $levelDescription]);
    }

    public function edit(League $league)
    {
        return view('leagues.edit', ['league' => $league]);
    }

    public function update(StoreLeagueRequest $request, League $league)
    {
        $data = $request->validated();

        $league->update($data);

        return redirect()->route('leagues.index');
    }

    public function destroy(League $league)
    {
        // We need to check if the league has games before deleting it, try to delete it and catch the exception if it fails.
        try {
            $league->delete();
        } catch (QueryException $e) {
            // back() will redirect the user back to the previous page.
            return back()->with('error', 'The league has games, you can not delete it.');
        }

        return redirect()->route('leagues.index');
    }

    // We use the SelectLeagueRequest to validate the incoming request.
    public function selectLeague(SelectLeagueRequest $request)
    {
        // We'll get the league_id from the validated request.
        $league_id = $request->validated()['league_id'];
        // We'll store the league_id in the session.
        session(['league_id' => $league_id]);

        // back() will redirect the user back to the previous page, reloading the actual page of the form.
        return back();
    }
}
