<?php

namespace Modules\Product\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Product\Models\Product;
use Modules\User\Models\User as AuthenticatedUser;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Product $product
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, Product $product)
    {

        return true;
    }

    /**
     * Determine whether the user can create Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Product $product
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, Product $product)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Product $product
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, Product $product)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Product $product
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, Product $product)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the Product.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Product $product
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, Product $product)
    {

        return true;
    }
}
