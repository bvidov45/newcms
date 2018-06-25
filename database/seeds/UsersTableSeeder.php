<?php

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
        App\User::create([
            'name' => 'bobobobo',
            'email' => 'bv@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
