<?php

namespace Modules\Order\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Order\Models\OrderStatus;
use Modules\User\Models\User as AuthenticatedUser;

class OrderStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderStatus $orderStatus
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, OrderStatus $orderStatus)
    {

        return true;
    }

    /**
     * Determine whether the user can create OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderStatus $orderStatus
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, OrderStatus $orderStatus)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderStatus $orderStatus
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, OrderStatus $orderStatus)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderStatus $orderStatus
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, OrderStatus $orderStatus)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the OrderStatus.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderStatus $orderStatus
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, OrderStatus $orderStatus)
    {

        return true;
    }
}
