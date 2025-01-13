<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LeagueScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // If the current route is any of the leages route, don't apply the scope.
        if (request()->routeIs('leagues*')) {
            return;
        }

        // We'll get the league_id from the session.
        $leagueId = session('league_id');
        // If we have a league_id, we'll filter the teams by that league.
        if ($leagueId) {
            $builder->where('league_id', $leagueId);
        }
    }
}
