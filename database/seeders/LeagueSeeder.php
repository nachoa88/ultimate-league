<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('leagues')->insert([
            [
                'name' => 'LaLiga',
                'country' => 'Spain',
                'level' => 1,
                'teams_number' => 20,
            ],
            [
                'name' => 'LaLiga Hypermotion',
                'country' => 'Spain',
                'level' => 2,
                'teams_number' => 22,
            ],
        ]);
    }
}