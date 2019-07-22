<?php


namespace App\Modules\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\User;

class CodeRequestController extends Controller
{
    public function __invoke(User $user)
    {

        return ['code' => $user->verification_code];
    }
}
