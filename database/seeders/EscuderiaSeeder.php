<?php

namespace Database\Seeders;


use App\Models\Escuderia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscuderiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Escuderia::create([
            'nombre' => 'Red Dart',
            'imagen' => '/images/escuderias/escuderia_roja.png',
            'coche_id' => '1',
        ]);

        Escuderia::create([
            'nombre' => 'Hurricane',
            'imagen' => '/images/escuderias/escuderia_naranja.png',
            'coche_id' => '2',
        ]);

        Escuderia::create([
            'nombre' => 'Bootstep',
            'imagen' => '/images/escuderias/escuderia_azul.png',
            'coche_id' => '3',
        ]);

        Escuderia::create([
            'nombre' => 'Moerani',
            'imagen' => '/images/escuderias/escuderia_amarilla.png',
            'coche_id' => '4',
        ]);

        Escuderia::create([
            'nombre' => 'Subiko',
            'imagen' => '/images/escuderias/escuderia_verde.png',
            'coche_id' => '5',
        ]);

        Escuderia::create([
            'nombre' => 'Dikla',
            'imagen' => '/images/escuderias/escuderia_morada.png',
            'coche_id' => '6',
        ]);
    }
}
