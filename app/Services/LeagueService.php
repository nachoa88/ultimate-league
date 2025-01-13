<?php

namespace App\Services;

use App\Models\League;

class LeagueService
{
    public function getAllLeagues()
    {
        return League::all();
    }
}