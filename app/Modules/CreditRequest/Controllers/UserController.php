<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Models\Email;
use App\Modules\CreditRequest\Requests\CreateUserRequest;
use App\Modules\CreditRequest\Requests\UpdateUserRequest;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use CreditRequestManager;

    public function __construct()
    {
        $this->middleware(['auth', 'withoutCredit'])->only(['edit', 'update']);
    }

    public function index()
    {
        if ($user = $this->canEditUser()) {
            return redirect()->route('users.edit', $user);
        }

        return $this->view(new User());
    }

    public function store(CreateUserRequest $request)
    {
        $user = $request->createUser();
        $this->createUserSession($user);

        return redirect()->route('clients.index');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return $this->view($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $request->UpdateUser($user);
        $this->createUserSession($user);

        return redirect()->route('users.edit', $user)->with(['success' => 'ok']);
    }

    private function view($user)
    {
        $emails = Email::pluck('name');
        return view('creditRequest.user', compact('emails', 'user'));
    }
}
