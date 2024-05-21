<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bot;

class BotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bot::create([
            'nombre' => 'A1',
            'coche_id' => '6',
            'user_id' => '1',
        ]);

        Bot::create([
            'nombre' => 'A2',
            'coche_id' => '3',
            'user_id' => '2',
        ]);

        Bot::create([
            'nombre' => 'A3',
            'coche_id' => '1',
            'user_id' => '3',
        ]);

        Bot::create([
            'nombre' => 'A4',
            'coche_id' => '4',
            'user_id' => '4',
        ]);

        Bot::create([
            'nombre' => 'A5',
            'coche_id' => '5',
            'user_id' => '5',
        ]);

        Bot::create([
            'nombre' => 'A6',
            'coche_id' => '2',
            'user_id' => '6',
        ]);

        Bot::create([
            'nombre' => 'B1',
            'coche_id' => '6',
            'user_id' => '7',
        ]);

        Bot::create([
            'nombre' => 'B2',
            'coche_id' => '3',
            'user_id' => '8',
        ]);

        Bot::create([
            'nombre' => 'B3',
            'coche_id' => '1',
            'user_id' => '9',
        ]);

        Bot::create([
            'nombre' => 'B4',
            'coche_id' => '4',
            'user_id' => '10',
        ]);

        Bot::create([
            'nombre' => 'B5',
            'coche_id' => '5',
            'user_id' => '11',
        ]);

        Bot::create([
            'nombre' => 'B6',
            'coche_id' => '2',
            'user_id' => '12',
        ]);
    }
}
