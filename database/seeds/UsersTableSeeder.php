<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name'      => 'Thiago Alves',
            'email'     => 'thiagoalves@oi.net.br',
            'password'  => bcrypt('123456'),
        ]);

        User::create([
            'name'      => 'Emili',
            'email'     => 'emili@oi.net.br',
            'password'  => bcrypt('123456'),
        ]);
    }
}
