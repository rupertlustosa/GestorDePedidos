<?php

namespace Modules\Order\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Order\Models\Order;
use Modules\User\Models\User as AuthenticatedUser;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Order $order
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, Order $order)
    {

        return true;
    }

    /**
     * Determine whether the user can create Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Order $order
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, Order $order)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Order $order
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, Order $order)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Order $order
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, Order $order)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the Order.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param Order $order
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, Order $order)
    {

        return true;
    }
}
