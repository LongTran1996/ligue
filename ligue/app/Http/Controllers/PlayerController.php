<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
	public function index($season_id,$league_id) {
		$players = new \Illuminate\Database\Eloquent\Collection;

		if ($season != null) {
			$season = Season::All()->find($season->id)->get();
			$league = $season->league();
		}

		else {
			$league = $season->league()->All()->find($league->id)->get();

		}


		$teams = $league->teams();	


		
		foreach ($teams as $team) {
			$players2 = $team->players();
			foreach($players2 as $player) {
				if (!($players.contains('id',$player->id)))
				{
					$stats = $player->stats();
					foreach($stats as $stat){
						$type = $stat->type();
						if ($type->id == 1 ){
							$player->goals += 1;    				
						}
						if ($type->id == 2) {
							$player->assists += 1;
						}
					}
					$players->push($player);

				}
			}

		}
		$leagues = League::All()->get();
		$players = $players->sortByDesc('goals');

		return view('players.index', compact('players'));
	}
	
	public function player(player $player) { 
		$player = Player::all()->find($id);
		$stats = $player->stats();
		foreach($stats as $stat){
			$type = $stat->type();
			if ($type->id == 1 ){
				$player->goals += 1;    				
			}
			if ($type->id == 2) {
				$player->assists += 1;
			}
		}
		return view('players.player', compact('player'));

	}

	public function create()
	{
		return view('players.create');
	}


	public function edit(player $player) {

		
		//return ($post->id);
		return view('players.edit', compact('player'));

	}

	public function update($id, Request $request)
	{		
		$player = Player::all()->find($id);
		$player->name = $request['name'];
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
