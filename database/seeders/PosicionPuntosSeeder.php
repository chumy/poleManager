<?php

namespace Database\Seeders;

use App\Models\PosicionPunto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosicionPuntosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PosicionPunto::create([
            'posicion' => 0,
            'puntos' => 0
        ]);

        PosicionPunto::create([
            'posicion' => 1,
            'puntos' => 10
        ]);

        PosicionPunto::create([
            'posicion' => 2,
            'puntos' => 8
        ]);

        PosicionPunto::create([
            'posicion' => 3,
            'puntos' => 6
        ]);

        PosicionPunto::create([
            'posicion' => 4,
            'puntos' => 5
        ]);

        PosicionPunto::create([
            'posicion' => 5,
            'puntos' => 4
        ]);

        PosicionPunto::create([
            'posicion' => 6,
            'puntos' => 3
        ]);

        PosicionPunto::create([
            'posicion' => 0,
            'puntos' => 0,
            'ultima' => true

        ]);

        PosicionPunto::create([
            'posicion' => 1,
            'puntos' => 15,
            'ultima' => true
        ]);

        PosicionPunto::create([
            'posicion' => 2,
            'puntos' => 12,
            'ultima' => true
        ]);

        PosicionPunto::create([
            'posicion' => 3,
            'puntos' => 9,
            'ultima' => true
        ]);

        PosicionPunto::create([
            'posicion' => 4,
            'puntos' => 7,
            'ultima' => true
        ]);

        PosicionPunto::create([
            'posicion' => 5,
            'puntos' => 5,
            'ultima' => true
        ]);

        PosicionPunto::create([
            'posicion' => 6,
            'puntos' => 3,
            'ultima' => true
        ]);
    }
}
