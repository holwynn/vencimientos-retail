<?php

namespace App\Policies;

use App\User;
use App\Expiration;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpirationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the expiration.
     *
     * @param  \App\User  $user
     * @param  \App\Expiration  $expiration
     * @return mixed
     */
    public function view(User $user, Expiration $expiration)
    {
        //
    }

    /**
     * Determine whether the user can create expirations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->level >= User::LEVEL_EMPLOYEE;
    }

    /**
     * Determine whether the user can update the expiration.
     *
     * @param  \App\User  $user
     * @param  \App\Expiration  $expiration
     * @return mixed
     */
    public function update(User $user, Expiration $expiration)
    {
        return $user->level >= User::LEVEL_EMPLOYEE;
    }

    /**
     * Determine whether the user can delete the expiration.
     *
     * @param  \App\User  $user
     * @param  \App\Expiration  $expiration
     * @return mixed
     */
    public function delete(User $user, Expiration $expiration)
    {
        return $user->level >= User::LEVEL_EMPLOYEE;
    }

    /**
     * Determine whether the user can restore the expiration.
     *
     * @param  \App\User  $user
     * @param  \App\Expiration  $expiration
     * @return mixed
     */
    public function restore(User $user, Expiration $expiration)
    {
        return $user->level >= User::LEVEL_EMPLOYEE;
    }

    /**
     * Determine whether the user can permanently delete the expiration.
     *
     * @param  \App\User  $user
     * @param  \App\Expiration  $expiration
     * @return mixed
     */
    public function forceDelete(User $user, Expiration $expiration)
    {
        return $user->level >= User::LEVEL_EMPLOYEE;
    }
}
