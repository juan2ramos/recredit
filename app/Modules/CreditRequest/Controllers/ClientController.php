<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Models\Client;
use App\Models\City;
use App\Models\Point;
use App\Modules\CreditRequest\Requests\ClientRequest;
use App\Modules\CreditRequest\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    use CreditRequestManager;

    public function __construct()
    {
        $this->authorizeResource(Client::class);
    }

    public function index()
    {
        $this->authorize('view', Client::class);

        if ($user = $this->canEditClient()) {

            return redirect()->route('clients.edit', $user);
        }

        return $this->view(Client::class);
    }

    public function store(ClientRequest $request)
    {
        $request->createClient();

        return redirect()->route('reference.index');
    }


    public function edit(Client $client)
    {
        return $this->view($client);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $request->updateClient();
        return redirect()->back()->with(['success' => 'ok']);
    }

    private function view($client)
    {
        $cities = City::all();
        $points = Point::all();
        $city = $client ? $client->point->city->id : ' ';

        return view('creditRequest.client', compact('cities', 'points', 'client', 'city'));
    }

}
