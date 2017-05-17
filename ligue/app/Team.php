<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

        public function players()
    {
    	  return $this->belongsToMany(Player::class, 'Player_Team');
    }
            public function league()
    {
    	  return $this->belongsTo(League::class);
    }

    public function matchs() {
    	$matchs = Match::where('visitor_team', '=', $this->id)->orWhere('local_team', '=', $this->id);
    	return $matchs;
    }

}
