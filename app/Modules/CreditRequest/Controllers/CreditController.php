<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\CreditRequest\Requests\CreditRequest;

class CreditController extends Controller
{
    use CreditRequestManager;

    public function __invoke(CreditRequest $request)
    {
        $request->createCredit();
        $request->session()->forget('userProcess');

        return ['creditCreated' => true];
    }

}
