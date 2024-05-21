<?php

namespace Database\Seeders;


use App\Models\Coche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CocheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coche::create([
            'nombre' => 'Rojo',
            'imagen' => '/images/coches/coche_rojo.png',
        ]);

        Coche::create([
            'nombre' => 'Naranja',
            'imagen' => '/images/coches/coche_naranja.png',
        ]);

        Coche::create([
            'nombre' => 'Azul',
            'imagen' => '/images/coches/coche_azul.png',
        ]);

        Coche::create([
            'nombre' => 'Amarillo',
            'imagen' => '/images/coches/coche_amarillo.png',
        ]);

        Coche::create([
            'nombre' => 'Verde',
            'imagen' => '/images/coches/coche_verde.png',
        ]);

        Coche::create([
            'nombre' => 'Morado',
            'imagen' => '/images/coches/coche_lila.png',
        ]);
    }
}
