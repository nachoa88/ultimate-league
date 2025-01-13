<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{

    public function run(): void
    {
        // Get the team IDs
        $barcelonaId = DB::table('teams')->where('name', 'Barcelona')->first()->id;
        $realMadridId = DB::table('teams')->where('name', 'Real Madrid')->first()->id;
        $gironaId = DB::table('teams')->where('name', 'Girona')->first()->id;
        $athleticId = DB::table('teams')->where('name', 'Athletic')->first()->id;

        DB::table('games')->insert([
            [
                'league_id' => 1,
                'home_team_id' => $barcelonaId,
                'away_team_id' => $gironaId,
                'date' => now()->subDays(17),
                'home_team_goals' => 1,
                'away_team_goals' => 1,
                'matchweek' => 1,
            ],
            [
                'league_id' => 1,
                'home_team_id' => $athleticId,
                'away_team_id' => $realMadridId,
                'date' => now()->subDays(16),
                'home_team_goals' => 3,
                'away_team_goals' => 1,
                'matchweek' => 1,
            ],
            [
                'league_id' => 1,
                'home_team_id' => $athleticId,
                'away_team_id' => $barcelonaId,
                'date' => now()->subDays(9),
                'home_team_goals' => 4,
                'away_team_goals' => 2,
                'matchweek' => 2,
            ],
            [
                'league_id' => 1,
                'home_team_id' => $realMadridId,
                'away_team_id' => $gironaId,
                'date' => now()->subDays(8),
                'home_team_goals' => 1,
                'away_team_goals' => 1,
                'matchweek' => 2,
            ],
            [
                'league_id' => 1,
                'home_team_id' => $barcelonaId,
                'away_team_id' => $realMadridId,
                'date' => now()->subDays(2),
                'home_team_goals' => 2,
                'away_team_goals' => 1,
                'matchweek' => 3,
            ],
            [
                'league_id' => 1,
                'home_team_id' => $gironaId,
                'away_team_id' => $athleticId,
                'date' => now()->subDays(1),
                'home_team_goals' => 1,
                'away_team_goals' => 3,
                'matchweek' => 3,
            ],
        ]);
    }
}
