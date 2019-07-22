<?php


namespace App\Modules\CreditRequest\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

trait CreditRequestManager
{

    protected function createUserSession(User $user)
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            session(['userProcess' => $user]);
            return;
        }

        if (!Auth::check()) {
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
        $user = Auth::user()->isAdmin() ? session('userProcess') : Auth::user();

        return $user->files()->get();
    }

    protected function deleteUserProcess(Request $request)
    {
        $user = $request->session()->get('userProcess');
        $user->delete();
        return $this->deleteSession($request);
    }

    protected function deleteSessionUserProcess(Request $request)
    {
        return $this->deleteSession($request);
    }

    private function deleteSession($request)
    {
        $request->session()->forget('userProcess');
        return redirect()->route('home');
    }
}
