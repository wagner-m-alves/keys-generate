<?php

namespace Database\Seeders;

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
        User::create([
            'name'      => 'User 1',
            'email'     => 'user1@test.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
