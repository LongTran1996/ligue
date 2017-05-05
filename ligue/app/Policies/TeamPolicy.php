<?php

namespace App\Policies;

use App\User;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function view(User $user, Player $player)
    {
        //
    }

    /**
     * Determine whether the user can create players.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        if ($user->hasAdminRole()){
            return true
        }
        else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the player.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function update(User $user, Player $player)
    {
        //

  if ($user->hasAdminRole() or ($user->hasTeamAdminRole()
         and  $player->teams()->pluck('admin_id')->contains($user->id())) ){
            
            return true
        }
        else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the player.
     *
     * @param  \App\User  $user
     * @param  \App\Player  $player
     * @return mixed
     */
    public function delete(User $user, Player $player)
    {
        
        if ($user->hasAdminRole()) {
            
            return true
        }
        else {
            return false;
        }
    }
}

}
