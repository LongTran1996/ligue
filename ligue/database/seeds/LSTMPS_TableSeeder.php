<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Match;

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
        // Nombre de season par league
        $nbs = 5;
        // Nombre de league
        $nbl = 10;
        // Nombre de saison pour stats par league
        $nbss = 2;
        // Nombre de jours dans une saison
        $nbjs = 270;

        factory(App\League::class, $nbl)->create()->each(function ($a) use ($nbt, $nbp, $nbs, $nbjs) {


            $startDate = Carbon::createFromDate(2012, 9, 1);
        	// Seasons
        	for($i = 0; $i < $nbs; $i++) {
                $endDate =  Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addDays($nbjs);

                $season = factory(App\Season::class)->make();
                $season->start_date = $startDate->toDateTimeString();
                $season->end_date = $endDate->toDateTimeString();

        		$a->seasons()->save($season);
                $startDate->addYears(1);
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

                                // Stats
                                $this->CreateStats($match);
			        		}
		        		}
					}
				}
        	});
        });
    }

    public function CreateStats(Match $match) {
        $lTeam = $match->local;
        $vTeam = $match->visitor;

        // Stats pour l'équipe locale
        for($i = 0; $i < $match->final_score_local; $i++) {
            $nbAssist = rand(0,1);

            // Créer les stats de but
            $but = factory(App\Stats::class)->make();
            $but->player_id = $lTeam->players->random()->id;
            $but->stat_types_id = 1;
            $match->stats()->save($but);

            // Créer les stats d'assist
            for($j = 0; $j < $nbAssist; $j++) {
                $aPlayerId = $lTeam->players->random()->id;
                while($aPlayerId == $but->player_id) {
                    $aPlayerId = $lTeam->players->random()->id;
                }

                $assist = new App\Stats;
                $assist->stat_types_id = 2;
                $assist->player_id = $aPlayerId;
                $assist->time = $but->time;
                $assist->period = $but->period;
                $match->stats()->save($assist);
            }
        }

        // Stats pour l'équipe visiteure
        for($i = 0; $i < $match->final_score_visitor; $i++) {
            $nbAssist = rand(0,1);

            // Créer les stats de but
            $but = factory(App\Stats::class)->make();
            $but->player_id = $vTeam->players->random()->id;
            $but->stat_types_id = 1;
            $match->stats()->save($but);

            // Créer les stats d'assist
            for($j = 0; $j < $nbAssist; $j++) {
                $aPlayerId = $vTeam->players->random()->id;
                while($aPlayerId == $but->player_id) {
                    $aPlayerId = $vTeam->players->random()->id;
                }

                $assist = new App\Stats;
                $assist->stat_types_id = 2;
                $assist->player_id = $aPlayerId;
                $assist->time = $but->time;
                $assist->period = $but->period;
                $match->stats()->save($assist);
            }
        }
    }
}
