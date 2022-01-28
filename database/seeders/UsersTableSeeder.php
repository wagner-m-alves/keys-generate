<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = Player::first();

        User::create([
            'player_id' => $player->id,
            'name'      => 'Harvey Specter',
            'email'     => 'harvey.specter@test.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
