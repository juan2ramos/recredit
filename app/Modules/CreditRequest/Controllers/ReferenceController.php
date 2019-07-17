<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use App\Modules\CreditRequest\Requests\ReferenceRequest;
use App\User;

class ReferenceController extends Controller
{
    use CreditRequestManager;

    public function index()
    {
        $this->authorize('view', Reference::class);

        if ($user = $this->canEditReference()) {

            return redirect()->route('references.edit', $user);
        }

        return $this->view(new User(), collect());
    }

    public function store(ReferenceRequest $request)
    {
        $request->createReferences();

        return redirect()->route('files.index');
    }


    public function edit(User $user)
    {
        $references = $user->load('references')->references;
        $this->authorize('update', [Reference::class, $references]);


        return $this->view($user, $references);

    }

    public function update(ReferenceRequest $request, User $user)
    {
        $references = $user->load('references')->references;
        $this->authorize('update', [Reference::class, $references]);

        $request->updateReferences($references);

        return back()->with(['success' => 'ok']);
    }

    private function view($user, $references)
    {
        return view('creditRequest.references', compact('user', 'references'));
    }

}
