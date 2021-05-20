<?php

namespace App\Policies;

use App\User;
use App\Discussion;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any discussions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the discussion.
     *
     * @param  \App\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function view(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can create discussions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the discussion.
     *
     * @param  \App\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function update(User $user, Discussion $discussion)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the discussion.
     *
     * @param  \App\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function delete(User $user, Discussion $discussion)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the discussion.
     *
     * @param  \App\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function restore(User $user, Discussion $discussion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the discussion.
     *
     * @param  \App\User  $user
     * @param  \App\Discussion  $discussion
     * @return mixed
     */
    public function forceDelete(User $user, Discussion $discussion)
    {
        //
    }
}
