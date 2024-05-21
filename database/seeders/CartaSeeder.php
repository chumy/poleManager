<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carta;

class CartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Pilotos
        Carta::create([
            'nombre' => 'A1',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'A2',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'A3',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'A4',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'A5',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'A6',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B1',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B2',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B3',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B4',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B5',
            'tipo' => '1',
        ]);

        Carta::create([
            'nombre' => 'B6',
            'tipo' => '1',
        ]);

        //Pilotos
        Carta::create([
            'nombre' => 'Patrick Scheffler',
            'imagen' => '/images/pilotos/piloto_A1.png',
            'tipo' => '0',
        ]);

        Carta::create([
            'nombre' => 'Rob Jansen',
            'imagen' => '/images/pilotos/piloto_A2.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Samuel Martin',
            'imagen' => '/images/pilotos/piloto_A3.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Jean Piaget',
            'imagen' => '/images/pilotos/piloto_A4.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Paul Wallace',
            'imagen' => '/images/pilotos/piloto_A5.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Henry Brown',
            'imagen' => '/images/pilotos/piloto_A6.png',
            'tipo' => '0',
        ]);

        Carta::create([
            'nombre' => 'Jacob Steiner',
            'imagen' => '/images/pilotos/piloto_B1.png',
            'tipo' => '0',
        ]);

        Carta::create([
            'nombre' => 'Carlos Rodriguez',
            'imagen' => '/images/pilotos/piloto_B2.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Marcelo Pereira',
            'imagen' => '/images/pilotos/piloto_B3.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Aleksi Korhonen',
            'imagen' => '/images/pilotos/piloto_B4.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Oliver Taylor',
            'imagen' => '/images/pilotos/piloto_B5.png',
            'tipo' => '0',
        ]);
        Carta::create([
            'nombre' => 'Alessandro Lombardi',
            'imagen' => '/images/pilotos/piloto_B6.png',
            'tipo' => '0',
        ]);
    }
}
