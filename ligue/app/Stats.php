<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{


	public function player()
    {
    	return $this->belongsTo(Player::class);
    }
    	 public function match()
    {
    	return $this->belongsTo(Match::class);
    }

    public function type() 
    {
    	return $this->belongsTo(Stat_Type::class);
    }
}
