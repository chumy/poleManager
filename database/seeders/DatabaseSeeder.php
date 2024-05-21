<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CircuitoSeeder::class);
        $this->call(PosicionPuntosSeeder::class);
        $this->call(CocheSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EscuderiaSeeder::class);
        $this->call(BotSeeder::class);
        $this->call(CartaSeeder::class);
        $this->call(CampeonatoSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(InscritoSeeder::class);
        $this->call(PaisSeeder::class);

    }
}
