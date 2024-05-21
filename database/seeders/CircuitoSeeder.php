<?php

namespace Database\Seeders;


use App\Models\Circuito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircuitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Circuito::create([
            'nombre' => 'Great Britain',
            'country' => 'GB',
        ]);

        Circuito::create([
            'nombre' => 'Spain',
            'country' => 'ES',
        ]);
        Circuito::create([
            'nombre' => 'China',
            'country' => 'CN',
        ]);
        Circuito::create([
            'nombre' => 'Italy',
            'country' => 'IT',
        ]);
        Circuito::create([
            'nombre' => 'Monaco',
            'country' => 'MC',
        ]);

        Circuito::create([
            'nombre' => 'Brazil',
            'country' => 'BR',
        ]);
    }
}
