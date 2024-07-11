<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('juegos')->insert([
            ['nombre' => 'Poker', 'cantidad_jugadores' => 4, 'juego_de_cartas' => true],
            ['nombre' => 'Ruleta', 'cantidad_jugadores' => 1, 'juego_de_cartas' => false],
        ]);
    }
}
