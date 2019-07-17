<?php

namespace App\Modules\Admin\Controllers;


use App\Models\Credit;
use App\Models\Reason;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Request\UpdateCreditRequest;
use Illuminate\Http\Request;

class CreditController extends Controller
{

    public function index()
    {
        $credits = Credit::pending()->get();

        return view('admin.credits.index', compact('credits'));
    }

    public function show(Credit $credit)
    {
        $this->authorize('update', $credit);

        $user = $credit->user->load('client.point.city', 'files', 'references');
        $reasons = Reason::all();

        return view('admin.credits.credit', compact('credit', 'user', 'reasons'));
    }

    public function update(UpdateCreditRequest $request, Credit $credit)
    {
        $request->updateCredit();
    }

}
