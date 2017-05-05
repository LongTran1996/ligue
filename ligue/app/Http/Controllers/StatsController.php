<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    	
    public function index() {

    $stats = Stats::All()
    ->get();
    	return view('stats', compact('stats'));
	}
}
