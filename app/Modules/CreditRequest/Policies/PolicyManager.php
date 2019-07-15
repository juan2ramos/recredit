<?php


namespace App\Modules\CreditRequest\Policies;


use App\User;

trait PolicyManager
{
    protected function getUserToEvaluate($authUser): User
    {
        $user = $authUser->isAdmin() ? session('userProcess') : $authUser;

        if (!$user) {
            abort('404');
        }

        return $user;
    }
}
