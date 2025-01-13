<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\LeagueScope;

#[ScopedBy([LeagueScope::class])]
class Game extends Model
{
    protected $fillable = [
        'league_id',
        'home_team_id',
        'away_team_id',
        'date',
        'home_team_goals',
        'away_team_goals',
        'matchweek',
    ];


    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class, 'league_id');
    }
}
