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

        if (!Auth::check() ) {
            Auth::login($user);
        }

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

            return $user->hasClient() ? $user : false;
        }

        return false;
    }

    protected function canEditReference()
    {

        if ($user = $this->canEditClient()) {

            return $user->hasReferences() ? $user : false;
        }

        return false;
    }

    protected function canEditFile()
    {
        if ($user = $this->canEditReference()) {

            return $user->hasFiles() ? $user : false;
        }

        return false;
    }

    protected function files()
    {
        $user = Auth::user()->isAdmin() ? session('userProcess') :  Auth::user();

        return $user->files()->get();
    }
}
