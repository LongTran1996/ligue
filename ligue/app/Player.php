<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{


    public function teams()
    {
    	  return $this->belongsToMany(Team::class, 'Player_Team');
    }
        public function stats()
    {
    	  return $this->HasMany(Stats::class);
    }


    public function user()
    {
    	  return $this->belongsTo(User::class);
    }
}
