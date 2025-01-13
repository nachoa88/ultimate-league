<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{

    public function run(): void
    {
        // Get the league IDs
        $laligaId = DB::table('leagues')->where('name', 'LaLiga')->first()->id;
        $laligaHypermotionId = DB::table('leagues')->where('name', 'LaLiga Hypermotion')->first()->id;


        DB::table('teams')->insert([
            [
                'name' => 'Barcelona',
                'city' => 'Barcelona',
                'country' => 'Spain',
                'founded' => 1899,
                'stadium_name' => 'Camp Nou',
                'stadium_capacity' => 99354,
                'logo' => 'logos/barcelona.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Real Madrid',
                'city' => 'Madrid',
                'country' => 'Spain',
                'founded' => 1902,
                'stadium_name' => 'Santiago Bernabéu',
                'stadium_capacity' => 81044,
                'logo' => 'logos/real_madrid.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Girona',
                'city' => 'Girona',
                'country' => 'Spain',
                'founded' => 1930,
                'stadium_name' => 'Montilivi',
                'stadium_capacity' => 11473,
                'logo' => 'logos/girona.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Athletic',
                'city' => 'Bilbao',
                'country' => 'Spain',
                'founded' => 1898,
                'stadium_name' => 'San Mamés',
                'stadium_capacity' => 53289,
                'logo' => 'logos/athletic.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Real Sociedad',
                'city' => 'San Sebastián',
                'country' => 'Spain',
                'founded' => 1909,
                'stadium_name' => 'Anoeta',
                'stadium_capacity' => 39400,
                'logo' => 'logos/real_sociedad.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Sevilla',
                'city' => 'Sevilla',
                'country' => 'Spain',
                'founded' => 1890,
                'stadium_name' => 'Ramón Sánchez Pizjuán',
                'stadium_capacity' => 43835,
                'logo' => 'logos/sevilla.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Real Betis',
                'city' => 'Sevilla',
                'country' => 'Spain',
                'founded' => 1907,
                'stadium_name' => 'Benito Villamarín',
                'stadium_capacity' => 60720,
                'logo' => 'logos/betis.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Valencia',
                'city' => 'Valencia',
                'country' => 'Spain',
                'founded' => 1919,
                'stadium_name' => 'Mestalla',
                'stadium_capacity' => 55000,
                'logo' => 'logos/valencia.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Villarreal',
                'city' => 'Villarreal',
                'country' => 'Spain',
                'founded' => 1923,
                'stadium_name' => 'Estadio de la Cerámica',
                'stadium_capacity' => 23500,
                'logo' => 'logos/villarreal.png',
                'league_id' => $laligaId,
            ],
            [
                'name' => 'Andorra',
                'city' => 'Andorra la Vella',
                'country' => 'Andorra',
                'founded' => 1942,
                'stadium_name' => 'Estadi Nacional',
                'stadium_capacity' => 3300,
                'logo' => 'logos/andorra.png',
                'league_id' => $laligaHypermotionId,
            ],
            [
                'name' => 'Real Zaragoza',
                'city' => 'Zaragoza',
                'country' => 'Spain',
                'founded' => 1932,
                'stadium_name' => 'La Romareda',
                'stadium_capacity' => 34796,
                'logo' => 'logos/real_zaragoza.png',
                'league_id' => $laligaHypermotionId,
            ],
            [
                'name' => 'Levante',
                'city' => 'Valencia',
                'country' => 'Spain',
                'founded' => 1909,
                'stadium_name' => 'Ciutat de València',
                'stadium_capacity' => 26100,
                'logo' => 'logos/levante.png',
                'league_id' => $laligaHypermotionId,
            ],
            [
                'name' => 'Sporting Gijón',
                'city' => 'Gijón',
                'country' => 'Spain',
                'founded' => 1905,
                'stadium_name' => 'El Molinón',
                'stadium_capacity' => 30000,
                'logo' => 'logos/sporting.png',
                'league_id' => $laligaHypermotionId,
            ],
            [
                'name' => 'Espanyol',
                'city' => 'Barcelona',
                'country' => 'Spain',
                'founded' => 1900,
                'stadium_name' => 'RCDE Stadium',
                'stadium_capacity' => 40000,
                'logo' => 'logos/espanyol.png',
                'league_id' => $laligaHypermotionId,
            ],
            [
                'name' => 'Real Valladolid',
                'city' => 'Valladolid',
                'country' => 'Spain',
                'founded' => 1928,
                'stadium_name' => 'José Zorrilla',
                'stadium_capacity' => 26512,
                'logo' => 'logos/real_valladolid.png',
                'league_id' => $laligaHypermotionId,
            ],
        ]);
    }
}