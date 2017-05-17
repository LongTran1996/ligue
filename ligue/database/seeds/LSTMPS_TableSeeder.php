<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LSTMPS_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nombre d'équipes par league
        $nbt = 5;
        // Nombre de player par team
        $nbp = 15;
        // Nombre de season
        $nbs = 5;

        
        factory(App\League::class, 10)->create()->each(function ($a) use ($nbt, $nbp, $nbs) {

        	// Seasons
        	for($i = 0; $i < $nbs; $i++) {
        		$a->seasons()->save(factory(App\Season::class)->make());
        	}

        	// Teams
        	for($i = 0; $i < $nbt; $i++) {
        		$a->teams()->save(factory(App\Team::class)->make());
        	}

        	// Players
        	$a->teams()->each(function ($b) use ($nbp) {
        		for($i = 0; $i < $nbp; $i++) {
        			$player = factory(App\Player::class)->create();
        			DB::table('Player_Team')->insert([
        				'player_id' => $player->id,
        				'team_id' => $b->id
        				]);
        		}
        	});

        	// Matchs
        	$a->seasons()->each(function ($c) use ($a, $nbt) {
        		for($x = 0; $x < 2; $x++) {
					for($i = 0; $i < $nbt; $i++) {
	        			for($j = 0; $j < $nbt; $j++) {
	        				if($i < $j) {
                                $faker = Faker\Factory::create();
	        					$local = null;
                                $visitor = null;
	        					if(rand(0,1) == 0) {
	        						$local = $a->teams[$i];
	        						$visitor = $a->teams[$j];
	        					}
	        					else {
	        						$local = $a->teams[$j];
	        						$visitor = $a->teams[$i];
	        					}
				        		$date = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = $c->start_date, $endDate = $c->end_date)->getTimeStamp());

				        		$match = factory(App\Match::class)->make();
				        		$match->visitor_team = $visitor->id;
				        		$match->local_team = $local->id;
				        		$match->date = $date;
				        		$match->winning_team = (($match->final_score_local > $match->final_score_visitor) ? $match->local_team : $match->visitor_team);

				        		$c->matchs()->save($match);
			        		}
		        		}
					}
				}
        	});

        	// Stats
        });
    }
}
