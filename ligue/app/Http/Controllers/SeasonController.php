<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Season;

class SeasonController extends Controller
{
    //
    	public function index() {

    $seasons = Season::All()
    ->get();
    	return view('seasons', compact('seasons'));
	}
}
