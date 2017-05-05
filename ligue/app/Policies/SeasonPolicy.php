<?php

namespace App\Policies;

use App\User;
use App\Season;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeasonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the season.
     *
     * @param  \App\User  $user
     * @param  \App\Season  $season
     * @return mixed
     */
    public function view(User $user, Season $season)
    {
        //


    }

    /**
     * Determine whether the user can create seasons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)

    {
        if ($user->hasAdminRole()) {
            return true;
        }
        else {
        return false;
    }
    }

    /**
     * Determine whether the user can update the season.
     *
     * @param  \App\User  $user
     * @param  \App\Season  $season
     * @return mixed
     */
    public function update(User $user, Season $season)
    {
        if ($user->hasAdminRole()) {
            return true;
        }
        else {
        return false;
    }
    }

    /**
     * Determine whether the user can delete the season.
     *
     * @param  \App\User  $user
     * @param  \App\Season  $season
     * @return mixed
     */
    public function delete(User $user, Season $season)
    {
     if ($user->hasAdminRole()) {
            return true;
        }
        else {
        return false;
    }
    }
}
