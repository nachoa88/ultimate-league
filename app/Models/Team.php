<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\LeagueScope;

#[ScopedBy([LeagueScope::class])]
class Team extends Model
{
    use SoftDeletes;
    
    // The attributes that are mass assignable, which means we can assign values to these fields from the form.
    protected $fillable = [
        'league_id',
        'name',
        'city',
        'country',
        'founded',
        'stadium_name',
        'stadium_capacity',
        'logo'
    ];

    // A team has many home games and away games.
    public function homeGames(): HasMany
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames(): HasMany
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

    // A team belongs to a league.
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class, 'league_id');
    }
}
