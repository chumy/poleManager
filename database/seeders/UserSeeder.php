<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        User::create([
            'name' => 'Bot A1',
            'email' => 'bota1@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A1.png',
        ]);
        User::create([
            'name' => 'Bot A2',
            'email' => 'bota2@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A2.png',
        ]);
        User::create([
            'name' => 'Bot A3',
            'email' => 'bota3@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A3.png',
        ]);
        User::create([
            'name' => 'Bot A4',
            'email' => 'bota4@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A4.png',
        ]);
        User::create([
            'name' => 'Bot A5',
            'email' => 'bota5@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A5.png',
        ]);
        User::create([
            'name' => 'Bot A6',
            'email' => 'bota6@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_A6.png',
        ]);
        User::create([
            'name' => 'Bot B1',
            'email' => 'botb1@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B1.png',
        ]);
        User::create([
            'name' => 'Bot B2',
            'email' => 'botb2@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B2.png',
        ]);
        User::create([
            'name' => 'Bot B3',
            'email' => 'botb3@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B3.png',
        ]);
        User::create([
            'name' => 'Bot B4',
            'email' => 'botb4@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B4.png',

        ]); 
        User::create([
            'name' => 'Bot B5',
            'email' => 'botb5@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B5.png',
        ]);
        User::create([
            'name' => 'Bot B6',
            'email' => 'botb6@doitgames.com',
            'password' => bcrypt('Chamorro81'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'bot' => true,
            'avatar' => '/images/bots/bot_B6.png',
        ]);

        User::create([
            'name' => 'Chumy',
            'email' => 'chasnout@gmail.com',
            'password' => bcrypt('chamorro'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'avatar' => '/uploads/avatars/Kiteface.jpg',
        ]);
        User::create([
            'name' => 'David',
            'email' => 'chumy.chumon@gmail.com',
            'password' => bcrypt('chamorro'),
            'email_verified_at' => "2024-04-28 19:24:15",
            'avatar' => '/images/bots/robot.png',
        ]);
    }
}
