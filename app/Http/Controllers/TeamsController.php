<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Services\LeagueService;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    public function index(LeagueService $leagueService)
    {
        // Team::with('league') gets all the teams with their leagues, added ordered by name and paginated.
        $teams = Team::with('league')->orderBy('name')->paginate(10);
        // Pass the leagues to scope the teams.
        $leagues = $leagueService->getAllLeagues();

        // As the teams file is inside the view/teams folder, we need to specify the path to the view.
        return view('teams.teams', ['teams' => $teams, 'leagues' => $leagues]);
    }

    public function create(LeagueService $leagueService)
    {
        // As we need the Leagues to select when creating a new team, we use a service function to import them.
        $leagues = $leagueService->getAllLeagues();
        // Just show the create view, then store will be called.
        return view('teams.create', ['leagues' => $leagues]);
    }

    // POST calls the store method.
    public function store(StoreTeamRequest $request)
    {
        // ->validated() will validate the incoming request with the rules specified in the StoreTeamRequest class.
        $data = $request->validated();

        // The file is stored in the public disk.
        $data['logo'] = $request->file('logo')->store('logos', 'public');

        // Create a new team with the data from the form.
        Team::create($data);

        return redirect()->route('teams.index');
    }

    // Laravel automatically injects the Team model instance and passes it to the method.
    public function show(Team $team)
    {
        // Soon we'll show the team details.
        return view('teams.show', ['team' => $team]);
    }

    public function edit(Team $team, LeagueService $leagueService)
    {
        // As we need the Leagues to select when editing a new team, we use a service function to import them.
        $leagues = $leagueService->getAllLeagues();
        // Edit will show the edit view with the team data, then update will be called.
        return view('teams.edit', ['team' => $team, 'leagues' => $leagues]);
    }

    public function update(StoreTeamRequest $request, Team $team)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            // Delete the old logo
            Storage::disk('public')->delete($team->logo);
            // Store the new logo
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team)
    {
        // Check if we're performing a hard delete (this will be added in the view soon)
        if ($team->trashed()) {
            // If we're performing a hard delete, we delete the logo from storage.
            Storage::disk('public')->delete($team->logo);
        }
        // ->delete() is the function associated with destroying a model instance.
        $team->delete();

        return redirect()->route('teams.index');
    }

    public function showDeleted()
    {
        // We get all the teams that have been deleted.
        $teams = Team::onlyTrashed()->with('league')->get();

        return view('teams.deleted', ['teams' => $teams]);
    }

    public function restore($id)
    {
        // Find the team, including the deleted ones.
        $team = Team::withTrashed()->find($id);
        // Restore the team.
        $team->restore();

        return redirect()->route('teams.index');
    }
}
