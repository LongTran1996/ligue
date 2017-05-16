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
    	DB:table('users')->insert([
    		'name' => 'Admin',
    		'email' => 'admin@example.com',
    		'password' => bcrypt('password123'),
    		]);
    	factory(App\User::class, 799)->create();
    }
}
