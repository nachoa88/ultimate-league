<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class League extends Model
{
    protected $fillable = [
        'name',
        'country',
        'level',
        'teams_number'
    ];

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'league_id');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'league_id');
    }
}
