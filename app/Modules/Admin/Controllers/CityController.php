<?php

namespace App\Modules\Admin\Controllers;


use App\Models\City;
use App\Models\Region;
use App\Modules\Admin\Request\CreateCityRequest;

use App\Http\Controllers\Controller;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::with('region')->orderBy('name')->get();
        return view('admin.cities.index', compact('cities'));
    }


    public function create()
    {
        $this->authorize('superAdmin');
        $regions = Region::all('name', 'id');
        $city = new city();

        return view('admin.cities.create', compact('regions', 'city'));
    }

    public function store(CreateCityRequest $request)
    {

        $request->createCity();

        return redirect()->route('cities.index')->with(['success' => 'ok']);
    }


    public function edit(City $city)
    {
        $this->authorize('superAdmin');
        $regions = Region::all('name', 'id');
        $city->load('region');

        return view('admin.cities.create', compact('regions', 'city'));
    }

    public function update(CreateCityRequest $request, City $city)
    {
        $request->updateCity($city);

        return redirect()->route('cities.index')->with(['success' => 'ok']);
    }


    public function destroy($id)
    {
        //
    }


}
