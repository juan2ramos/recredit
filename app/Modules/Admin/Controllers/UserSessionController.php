<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserSessionController extends Controller
{

    public function __invoke(Request $request, User $user)
    {

        session(['userProcess' => $user]);

        return redirect()->route('users.index');

    }


}
