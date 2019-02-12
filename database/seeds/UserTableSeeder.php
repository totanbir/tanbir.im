<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'name' => 'Tanbirs',
        	'email' => 'admins@admin.gmail.com',
        	'password' => bcrypt('12345')
        	]);
    }
}
