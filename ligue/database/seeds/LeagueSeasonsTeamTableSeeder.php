<?php

use Illuminate\Database\Seeder;

class LeagueSeasonsTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\League::class, 10)->create()->each(function ($a) {
        	for($c = 0; $c < 5; $c++) {
        		$a->seasons()->save(factory(App\Season::class)->make());
        	}
        	for($c = 0; $c < 10; $c++) {
        		$a->teams()->save(factory(App\Team::class)->make());
        	}
        });
    }
}
