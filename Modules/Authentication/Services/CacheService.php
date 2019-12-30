<?php


namespace Modules\Authentication\Services;


use Illuminate\Support\Facades\Cache;

class CacheService
{

    static public function clearUsers()
    {

        Cache::forget('usersListOfAttendantChoices');
        Cache::forget('usersListOfClientChoices');
    }

    static public function clearOrderPoint()
    {

        Cache::forget('listOfChoices');
    }
}
