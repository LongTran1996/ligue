<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    	public function index() {

    $teams = Team::All()
    ->get();
    	return view('teams', compact('teams'));
	}
}
