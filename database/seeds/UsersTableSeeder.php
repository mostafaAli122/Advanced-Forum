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
            'name'=>'admin',
            'password'=>bcrypt('admin'),
            'email'=>'admin@advanced-forum.dev',
            'admin'=>1,
            'avatar'=>asset('avatars/avatar.png')
        ]);
        App\User::create([
            'name' => 'Emily Myers',
            'password' => bcrypt('password'),
            'email' => 'amily@myers.com',
            'avatar'=> asset('avatars/avatar.png')
        ]);
    }
}
