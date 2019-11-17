<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Email;
use App\Models\Point;
use App\Modules\CreditRequest\Requests\EntrepreneursFileRequest;
use App\Modules\CreditRequest\Requests\EntrepreneursRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrepreneursController extends Controller
{

    public function index()
    {
        $emails = Email::pluck('name');
        $cities = City::orderBy('name')->get();
        $points = Point::orderBy('name')->get();

        return view('creditRequest.entrepreneurs',
            compact('emails','cities', 'points'));

    }
    public function update(EntrepreneursRequest $request)
    {
        $request->createUser();
        return redirect()->route('home');

    }
    public function files(EntrepreneursFileRequest $request)
    {
        return $request->createFile();
    }

    public function filesDelete(Request $request)
    {
        Storage::disk('spaces')->delete($request->url);
        return ['success' => 'ok'];
    }


}
