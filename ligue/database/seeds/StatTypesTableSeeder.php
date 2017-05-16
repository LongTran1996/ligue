<?php

use Illuminate\Database\Seeder;

class StatTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stat_types')->insert(['name' => 'Goal']);
        DB::table('stat_types')->insert(['name' => 'Assist']);
    }
}
