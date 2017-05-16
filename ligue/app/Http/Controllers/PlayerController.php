<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
    	public function index() {

    $league = League::All()->first()->get();	
    $teams = $league->teams();	
    
    $players = Player::All()
    ->get();
   	

    	return view('players', compact('players'));
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
    	$player = Player::all()->find($id);;
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
		$league->category = request(['category');

		return redirect('/');

	}
}
