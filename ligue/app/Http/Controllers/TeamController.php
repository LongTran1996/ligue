<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    	public function index() {


    $league  = Ligue::All()
    ->get()->First();

    $teams = Team::All()
    ->get()->where('league_id', $league->id);
	$seasons = $league->seasons();

	foreach ($teams as $team){


	foreach ($seasons as $season) {
	$matchs = $season->matchs();
	foreach ($matchs as $match) 
		if ($match->visitor_team == $team->id){
			if ($match->winning_team == $match->visitor_team) {
				$team->wins += 1

			}
			else {
				$team->losses += 1
			}
		$team->goals += $match->final_score_visitor

		}
		if ($match->local_team == $team->id) {
			if ($match->winning_team == $match->local_team) {
				$team->wins += 1

				}
			else {
				$team->losses += 1
			}

		$team->goals += $match->final_score_local

		}
/*		if ($match->winning_team == $team->id ) {
		$match->wins += 1

		}
		if ($match->loca == $team->id) {

		}*/
	}

}

    	return view('teams.index', compact('teams'));

    
	}
}
