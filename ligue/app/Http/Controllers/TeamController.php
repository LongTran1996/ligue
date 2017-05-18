<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\League;
use App\Season;
use App\Player;
use App\Team;
use Carbon\Carbon;

class TeamController extends Controller
{
    //
    	public function index() {


    $league  = Ligue::All()
    ->get()->First();

    $teams = Team::All()
    ->get()->where('league_id', $league->id);

	$seasons = $league->seasons;

	foreach ($teams as $team){


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

		$team->goals += $match->final_score_local;

		}
	}
}

}

    	return view('teams.index', compact('teams'));

    
	}
		public function show(team $team, $season_id = null) { 
			if ($season_id == null){
			$date = Carbon::now();
	
			$league = $team->league;
			$season = $league->seasons->where('end_date', '=>', $date)->First();
			if ($season == null) {
				$season = $league->seasons->First();
			}
		

		}
		
			else {
					$league = $team->league;
					$season = $league->seasons->find($season_id);
			}

			$matchs = $season->matchs;
			$seasons = $league->seasons;
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

		$team->goals += $match->final_score_local;

		}
	}

		return view('teams.team', compact('team','league'));

	}

}
