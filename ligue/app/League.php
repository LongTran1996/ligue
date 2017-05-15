<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function teams()
    {
    	  return $this->HasMany(Team::class);
    }
    
    public function seasons()
    {
    	  return $this->HasMany(Season::class);
    }
}
        
