<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserSessionController extends Controller
{
    use CreditRequestManager;

    public function __invoke(Request $request, $action)
    {
        if ($action == 'deleteUserProcess') {
            return $this->deleteUserProcess($request);
        }
        return $this->deleteSessionUserProcess($request);
    }


}
