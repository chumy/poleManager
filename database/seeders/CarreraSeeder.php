<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Carrera::create([
            'orden' => '1',
            'campeonato_id' => '1',
            'circuito_id' => '1',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '2',
            'campeonato_id' => '1',
            'circuito_id' => '2',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '3',
            'campeonato_id' => '1',
            'circuito_id' => '4',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '4',
            'campeonato_id' => '1',
            'circuito_id' => '5',
            'ultima' => '1',
        ]);
        Carrera::create([
            'orden' => '1',
            'campeonato_id' => '2',
            'circuito_id' => '6',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '2',
            'campeonato_id' => '2',
            'circuito_id' => '5',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '3',
            'campeonato_id' => '2',
            'circuito_id' => '3',
            'ultima' => '0',
        ]);
        Carrera::create([
            'orden' => '4',
            'campeonato_id' => '2',
            'circuito_id' => '1',
            'ultima' => '1',
        ]);
    }
}
