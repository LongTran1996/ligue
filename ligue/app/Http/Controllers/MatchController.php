<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\League;
use App\Season;
use App\Team;

class MatchController extends Controller
{
    //
	public function __construct()
	{


	}
	public function index() {
		$leagues = League::get()->sortBy('name');
		return view('matchs.index', compact('leagues'));
	}

	public function show(Match $match)
	{
		return view('matchs.show', compact('match'));
	}

	public function teamShow(Team $team) 
	{
		return view('matchs.teamShow', compact('team'));
	}

	public function seasonShow(Season $season)
	{
		return view('matchs.seasonShow', compact('season'));
	}

	public function leagueShow(League $league) 
	{
		return view('matchs.leagueShow', compact('league'));
	}

	public function create()
	{
		return view('matchs.create');
	}


	public function edit(Match $match) {
		return view('matchs.edit', compact('match'));
	}

	public function update($id, Request $request)
	{		
		$match = Match::all()->find($id);

		$match->visitor_team = $request['visitor_team'];
		$match->local_team = $request['local_team'];
		$match->datetime =  Carbon\Carbon::now();
		$match->localisation = $request['localisation'];
		$match->season_id = $request['season_id'];
		$match->local_team = $request['local_team'];
		$match->local_team = $request['local_team'];



		$league->save();
        //

		return redirect()->route('leagues');
	}


	public function destroy($id)
	{
		Match::find($id)->delete();
		return redirect()->route('matchs.index');
	}

	public function store()
	{


			// 	$this->validate(request(), [
			// 	'visitor_team' => 'required',
			// 	'local_team' => 'required',
			// 	'datetime' => 'required',
			// 	'localisation' => 'required',
			// 	'season_id' => 'required'


			// ]);

		return redirect('/');
	}
}