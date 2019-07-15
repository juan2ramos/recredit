<?php

namespace App\Modules\SMS;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCode extends Controller
{
    use SMSManager;

    public function __invoke(Request $request)
    {
        $request->validate(['code' => 'required']);
        $this->authorize('view', Client::class);

        return $this->checkCode($request->code);
    }

    private function checkCode($code)
    {
        $user = (Auth::user()->isAdmin()) ? session('userProcess') : Auth::user();

        if ($code == $user->verification_code) {
            $user->verification_state = 1;
            $user->save();

            return ['status' => true];
        }

        return abort('403');
    }

}
