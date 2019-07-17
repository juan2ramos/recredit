<?php


namespace App\Modules\CreditRequest\Policies;


use App\User;

trait PolicyManager
{
    protected function getUserToEvaluate($authUser)
    {
        $user = $authUser->isAdmin() ? session('userProcess') : $authUser;

        if (!$user) {
            return new User();
        }

        return $user;
    }
}
