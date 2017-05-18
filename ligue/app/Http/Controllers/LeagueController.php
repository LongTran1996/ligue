<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;
use App\Season;
use App\Player;
use App\Team;

class LeagueController extends Controller
{
    	public function __construct()
	{
	

	}

    public function leagues()
    {

      $leagues = League::All()
    ->get();
    	return view('leagues.leagues', compact('leagues'));
    }












	 public function players($league_id, $season_id = null) {
	 	$players = collect();
		if ($season_id != null) {
			$season = Season::find($season_id);
			$league = $season->league;	

	
		}

		else {
			$league = League::find($league_id);

		}

			$teams = $league->teams;
			//$teams = Team::All()->where('league_id', $league_id);
    		

		foreach ($teams as $team) {


				
			foreach($team->players as $player) {
			//	if (!($players.contains('id',$player->id)))
		
					
					$stats = $player->stats;
					

					foreach($stats as $stat){
						$type = $stat->type;
						if ($type->id == 1 ){
							$player->goals += 1;    				
						}
						if ($type->id == 2) {
							$player->assists += 1;
						}
					}

					if ($player->goals == 0) {
						$player->goals = 0; 
					}
					if ($player->assists == 0) {
						$player->assists = 0; 
					}
					$players->push($player);

			//	}
			}
		}

		
		$players = $players->sortByDesc('goals');
			$players = $players->All();
		$leagues = League::All();

		return view('players.index', compact('players', 'leagues'));
    }




	public function create()
	{
		return view('leagues.create');
	}


	public function edit(league $league) {

			
		//return ($post->id);
		return view('leagues.edit', compact('league'));

	}

	   public function update($id, Request $request)
    {		
    	$league = League::all()->find($id);

    	$league->name = $request['name'];
    	$league->category = $request['category'];


    	$league->save();
        //
  		
		return redirect()->route('leagues');
	}


    	public function destroy($id)
	{
			$league = League::find($id)->delete();
		 return redirect()->route('leagues');

	}
		public function show(league $league)
	{
		return view('leagues.show', compact('league'));
	

	}


	public function store()
	{


		// $this->validate(request(), [
		// 		'name' => 'required',
		// 		'category' => 'required'
		// 	]);

		//$league = new League(request(['name', 'category']));
	    $league = new League;
		$league->name = request(['name']);
		$league->category = request(['category']);

		return redirect('/');

	}
	public function teams($league_id, $season_id = null)
	{
	

	if ($season_id == null) {
	$league = League::find($league_id); 
	$seasons = $league->seasons;

	
	}
	else {
	$season = Season::Find($season_id);
	$league = $season->league;

	}

	$teams = $league->teams;


	foreach ($teams as $team){

    if ($season_id != null) {
    	foreach ($season->matchs as $match) {
		if ($match->visitor_team == $team->id){
			if ($match->winning_team == $match->visitor_team) {
				$team->wins += 1;

			}
			else {
				$team->losses += 1;
			}

		$team->goals += $match->final_score_visitor;
		}

		
		if ($match->local_team == $team->id) {
			if ($match->winning_team == $match->local_team) {
				$team->wins += 1;

				}
			else {
				$team->losses += 1;
			}
			}
		if ($team->wins == 0) {
		   $team->losses = 0; 
					}
		if ($team->assists == 0) {
		$team->assists = 0; 
					}
		$team->goals += $match->final_score_local;

}

    }
    else {
	foreach ($seasons as $season) {
	$matchs = $season->matchs;

	foreach ($matchs as $match) {
		if ($match->visitor_team == $team->id){
			if ($match->winning_team == $match->visitor_team) {
				$team->wins += 1;

			}
			else {
				$team->losses += 1;
			}

		$team->goals += $match->final_score_visitor;
		}

		
		if ($match->local_team == $team->id) {
			if ($match->winning_team == $match->local_team) {
				$team->wins += 1;

				}
			else {
				$team->losses += 1;
			}
			}
		if ($team->wins == 0) {
		   $team->losses = 0; 
					}
		if ($team->assists == 0) {
		$team->assists = 0; 
					}
		$team->goals += $match->final_score_local;

}
}
}
}
		$leagues = League::All();

    	return view('teams.index', compact('teams', 'leagues'));

    }
	

}
