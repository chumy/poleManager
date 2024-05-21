<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Campeonato;

class CampeonatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campeonato::create([
            'id' => 1,
            'nombre' => 'Torneo por Escuderias Verano 2024',
            'num_coches' => '6',
            'num_carreras' => '4',
            'num_bots' => '5',
            'escuderias' => true,
            'descripcion' => 'Descripcion para el torneo por escuderias ',
            'oficial' => false,
            'activo' => false,
            'hashid' => 'h2E1',
            'desgaste' => true,
            'user_id' => 13,
        ]);

        Campeonato::create([
            'id' => 2,
            'nombre' => 'Torneo Pilotos 2024',
            'num_coches' => '4',
            'num_carreras' => '4',
            'num_bots' => '3',
            'escuderias' => false,
            'descripcion' => 'Descripcion para el torneo de pilots ',
            'oficial' => false,
            'activo' => false,
            'hashid' => 'h2E2',
            'user_id' => 13,
        ]);
    }
}



