<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Email;
use App\Models\File;
use App\Models\Point;
use App\Modules\CreditRequest\Requests\FileRequest;

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


}
