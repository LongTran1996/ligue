<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    public function teams()
    {
          return $this->HasMany(Team::class);
    }
<<<<<<< HEAD

=======
    
>>>>>>> 6b38fb6a1ad934ecb76403b8ca50d71fbd1fe722
    public function seasons()
    {
          return $this->HasMany(Season::class);
    }
<<<<<<< HEAD
}
=======
}
        
>>>>>>> 6b38fb6a1ad934ecb76403b8ca50d71fbd1fe722
