<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'full_name' => 'Ronald Windwaai',
            'password' => bcrypt('adminadmin'),
            'email' => 'ronaldwindwaai@gmail.com',
            'country' => 'Kenya',
            'verified' => true,
            'signup_terms' => true,

        ]);

        $user->assignRole('super-admin');
    }
}
