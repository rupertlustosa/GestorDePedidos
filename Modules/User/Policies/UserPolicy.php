<?php

namespace Modules\User\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\User\Models\User;
use Modules\User\Models\User as AuthenticatedUser;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any DocDummyPluralModel.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {
        return true;
    }

    /**
     * Determine whether the user can view the User.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param User $user
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can create DocDummyPluralModel.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {
        //
    }

    /**
     * Determine whether the user can update the User.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param User $user
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the User.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param User $user
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can restore the User.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param User $user
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the User.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param User $user
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, User $user)
    {
        //
    }
}
