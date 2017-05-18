<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Match extends Model
{
    //
    public function stats()
    {
    	return $this->HasMany(Stats::class);
    }
   	public function season()
    {
    	return $this->belongsTo(Season::class);
    }

    public function visitor() {
    	return $this->belongsTo(Team::class, 'visitor_team', 'id');
    }

    public function local() {
    	return $this->belongsTo(Team::class, 'local_team', 'id');
    }

    public function visitorStats() {
    	$visitorStats = new Collection();

    	foreach($this->stats as $stat) {
    		if($this->visitor->players->pluck('id')->contains($stat->player_id)) {
    			$visitorStats->add($stat);
    		}
    	}
    	return $visitorStats->sortBy('time')->sortBy('period');
    }

    public function localStats() {
    	$localStats = new Collection();

    	foreach($this->stats as $stat) {
    		if($this->local->players->pluck('id')->contains($stat->player_id)) {
    			$localStats->add($stat);
    		}
    	}
    	return $localStats->sortBy('time')->sortBy('period');
    }
}
