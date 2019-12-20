<?php

namespace Modules\Order\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Order\Models\OrderItem;
use Modules\User\Models\User as AuthenticatedUser;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderItem $orderItem
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, OrderItem $orderItem)
    {

        return true;
    }

    /**
     * Determine whether the user can create OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderItem $orderItem
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, OrderItem $orderItem)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderItem $orderItem
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, OrderItem $orderItem)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderItem $orderItem
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, OrderItem $orderItem)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the OrderItem.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderItem $orderItem
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, OrderItem $orderItem)
    {

        return true;
    }
}
