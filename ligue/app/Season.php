<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

	 public function league()
    {
    	return $this->belongsTo(League::class);
    }
            public function matchs()
    {
    	  return $this->HasMany(Match::class);
    }
}
