<?php

namespace Modules\Product\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Product\Models\Category;
use Modules\User\Models\User as AuthenticatedUser;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Category $category
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, Category $category)
    {

        return true;
    }

    /**
     * Determine whether the user can create Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Category $category
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, Category $category)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Category $category
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, Category $category)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Category $category
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, Category $category)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the Category.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Category $category
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, Category $category)
    {

        return true;
    }
}
