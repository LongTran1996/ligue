<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

	    public function players($league_id, $season_id) {
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

    	return view('teams.index', compact('teams'));
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

}
