<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\League;

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

	public function teamShow($id) {
		$team = \App\Team::find($id);
		return view('matchs.teamShow', compact('matchs'));
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
	public function show(Match $match)
	{
		return view('matchs.show', compact('matchs'));
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