<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inscrito;

class InscritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Inscrito::create([
            'user_id' => '3',
            'campeonato_id' => '1',
            'coche_id' => '4',
            'escuderia_id' => '4',
        ]);
        Inscrito::create([
            'user_id' => '6',
            'campeonato_id' => '1',
            'coche_id' => '5',
            'escuderia_id' => '5',
        ]);
        Inscrito::create([
            'user_id' => '13',
            'campeonato_id' => '1',
            'coche_id' => '6',
            'escuderia_id' => '6',
        ]);
        Inscrito::create([
            'user_id' => '1',
            'campeonato_id' => '1',
            'coche_id' => '4',
            'escuderia_id' => '4',
        ]);
        Inscrito::create([
            'user_id' => '11',
            'campeonato_id' => '1',
            'coche_id' => '5',
            'escuderia_id' => '5',
        ]);
        Inscrito::create([
            'user_id' => '8',
            'campeonato_id' => '1',
            'coche_id' => '6',
            'escuderia_id' => '6',
        ]);
    }
}
