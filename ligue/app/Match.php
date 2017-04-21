<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    	 public function stats()
    {
    	return $this->HasMany(Match::class);
    }
    	 public function season()
    {
    	return $this->belongsTo(Season::class);
    }
}
