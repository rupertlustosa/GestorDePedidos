<?php

namespace Modules\Order\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Order\Models\OrderPoint;
use Modules\User\Models\User as AuthenticatedUser;

class OrderPointPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderPoint $orderPoint
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, OrderPoint $orderPoint)
    {

        return true;
    }

    /**
     * Determine whether the user can create OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderPoint $orderPoint
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, OrderPoint $orderPoint)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderPoint $orderPoint
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, OrderPoint $orderPoint)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderPoint $orderPoint
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, OrderPoint $orderPoint)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the OrderPoint.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderPoint $orderPoint
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, OrderPoint $orderPoint)
    {

        return true;
    }
}
