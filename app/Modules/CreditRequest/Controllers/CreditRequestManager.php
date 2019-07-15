<?php


namespace App\Modules\CreditRequest\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;

trait CreditRequestManager
{

    protected function createUserSession(User $user)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            session(['userProcess' => $user]);
            return;
        }

        Auth::login($user);
    }

    protected function canEditUser()
    {
        if (session('userProcess')) {
            return session('userProcess');
        }

        return Auth::check() && Auth::user()->isClient() ? Auth::user() : false;
    }

    protected function canEditClient()
    {
        if ($user = $this->canEditUser()) {

            return $user->hasClient() ?? $user;
        }

        return false;
    }

    protected function canEditReference()
    {
        if ($user = $this->canEditClient()) {

            return $user->client->hasReference() ?? $user;
        }

        return false;
    }


}
