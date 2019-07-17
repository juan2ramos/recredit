<?php

namespace App\Modules\Admin\Controllers;

use App\Models\City;
use App\Models\Point;
use App\Models\Region;
use App\Modules\Admin\Request\CreateUserAdminRequest;
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

        $clients = User::role(['Credit','Entrepreneur'])->search($request->search)->with('credit')->take(40)->get();

        return view('admin.dashboard', compact('clients'));

    }


    public function create()
    {
        $cities = City::all('name', 'id');
        $points = Point::all();

        return view('admin.users.create', compact('cities', 'points'));
    }

    public function store(CreateUserAdminRequest $request)
    {
        $request->createAdmin();

        return ['success' => true];
    }

    public function show(User $user)
    {
        $user->load(['userClient.point.region', 'userReferences', 'userFiles', 'credit']);

        $regions = Region::all('name', 'id');
        $points = Point::all();

        return view('admin.users.user', compact('user', 'points', 'regions'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
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
