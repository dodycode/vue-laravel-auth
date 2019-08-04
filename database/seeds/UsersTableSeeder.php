<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        	'name' => 'Administrator',
        	'email' => 'laravuex@admin.com',
        	'password' => Hash::make('password'),
        	'api_token' => str_random(100),
        	'is_admin' => 1
        ]);
    }
}
