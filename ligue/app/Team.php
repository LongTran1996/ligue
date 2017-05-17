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

}
