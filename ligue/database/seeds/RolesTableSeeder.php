<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' => 'Admin']);
        DB::table('roles')->insert(['name' => 'TeamAdmin']);
        DB::table('roles')->insert(['name' => 'Registered']);

        $admin = DB::table('users')->where('email', 'admin@example.com')->first();
        $adminRole = DB::table('roles')->where('name', 'Admin')->first();

        DB::table('role_user')->insert([
        	'role_id' => $adminRole->id,
        	'user_id' => $admin->id
        	]);

    }
}
