<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat_Types extends Model
{

    public function stats()
    {
    	return $this->HasMany(Stat::class);
    }
}
