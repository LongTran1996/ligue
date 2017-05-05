<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    //
	public function __construct()
	{
	

	}
	public function index() {

    $matchs = Match::All()
    ->get();
    	return view('matchs', compact('matchs'));
	}


    public function matchs()
    {

      $matchs = Match::All()
    ->get();
    	return view('matchs.matchs', compact('matchs'));
    }




	public function create()
	{
		return view('matchs.create');
	}


	public function edit(match $match) {

			
		//return ($post->id);
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
			$league = League::find($id)->delete();
		 return redirect()->route('matchs');

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

		//$league = new League(request(['name', 'category']));
		$match = new Match;
		$match->name = request(['category']);
		$match->category = request(['category');	

		return redirect('/');
}
