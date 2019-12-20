<?php

namespace Modules\Order\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Order\Models\OrderType;
use Modules\User\Models\User as AuthenticatedUser;

class OrderTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function viewAny(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can view the OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderType $orderType
     * @return mixed
     */
    public function view(AuthenticatedUser $authenticatedUser, OrderType $orderType)
    {

        return true;
    }

    /**
     * Determine whether the user can create OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @return mixed
     */
    public function create(AuthenticatedUser $authenticatedUser)
    {

        return true;
    }

    /**
     * Determine whether the user can update the OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderType $orderType
     * @return mixed
     */
    public function update(AuthenticatedUser $authenticatedUser, OrderType $orderType)
    {

        return true;
    }

    /**
     * Determine whether the user can delete the OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderType $orderType
     * @return mixed
     */
    public function delete(AuthenticatedUser $authenticatedUser, OrderType $orderType)
    {

        return true;
    }

    /**
     * Determine whether the user can restore the OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderType $orderType
     * @return mixed
     */
    public function restore(AuthenticatedUser $authenticatedUser, OrderType $orderType)
    {

        return true;
    }

    /**
     * Determine whether the user can permanently delete the OrderType.
     *
     * @param AuthenticatedUser $authenticatedUser
     * @param OrderType $orderType
     * @return mixed
     */
    public function forceDelete(AuthenticatedUser $authenticatedUser, OrderType $orderType)
    {

        return true;
    }
}
