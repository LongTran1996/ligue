<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
