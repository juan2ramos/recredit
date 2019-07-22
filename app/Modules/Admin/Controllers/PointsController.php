<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\City;
use App\Modules\Admin\Request\PointRequest;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function index()
    {
        $points = Point::all();
        $cities = City::all();

        return view('admin.points.index', compact('points', 'cities'));
    }

    public function create()
    {
        return $this->view(new Point());
    }

    public function store(PointRequest $request)
    {
        $request->createPoint();

        return redirect()->route('points.index')->with(['success' => true]);
    }




    public function edit(Point $point)
    {
        return $this->view($point);
    }


    public function update(PointRequest $request, Point $point)
    {
        $request->updatePoint($point);
        return redirect()->route('points.index')->with(['success' => true]);
    }



    private function view($point)
    {
        $cities = City::all();
        return view('admin.points.create', compact('cities', 'point'));
    }
}
