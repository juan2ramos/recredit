<?php

namespace App\Modules\Admin\Controllers;

use App\Models\City;
use App\Models\Point;
use App\Modules\Admin\Request\CreateUserAdminRequest;
use App\Modules\Admin\Request\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->has('search')) {
            return view('admin.dashboard', ['clients' => collect()]);
        }
        $clients = User::role(['Credit', 'Entrepreneur'])->search($request->search)->with('credit.reason', 'client')->take(40)->get();

        return view('admin.dashboard', compact('clients'));

    }


    public function create()
    {
        $this->authorize('superAdmin');
        $cities = City::all('name', 'id');
        $points = Point::all();
        $admins = User::role(['SuperAdmin', 'Analysts', 'Point'])->with('roles')->get();

        return view('admin.users.create', compact('cities', 'points', 'admins'));
    }

    public function store(CreateUserAdminRequest $request)
    {
        $request->createAdmin();

        return ['success' => true];
    }

    public function show(User $user)
    {
        $user->load(['client.point.city', 'references', 'files', 'credit']);
        $credit = $user->credit->load('reason', 'assigned', 'reviewed','finished');
        $cities = City::orderBy('name')->get();
        $points = Point::orderBy('name')->get();

        return view('admin.users.user', compact('user', 'points', 'cities', 'credit'));
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->updateUser($user);
        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }

    public function loadUserSession(User $user)
    {
        if (Gate::denies('loadUserProcess', $user)) {
            return abort(404);
        }
        session(['userProcess' => $user]);

        return redirect()->route('CreditRequest.index');

    }

}
