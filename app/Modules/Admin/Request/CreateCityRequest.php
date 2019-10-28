<?php

namespace App\Modules\Admin\Request;

use App\Models\City;
use App\Models\Point;
use App\Models\Region;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateCityRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->isSuperAdmin()|| $this->user()->isAnalysts();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'region_id' => 'required',
        ];
    }

    public function createCity()
    {
        DB::transaction(function () {

            $region = Region::findOrFail($this->region_id);
            $city = new City(['name' => $this->name]);

            $region->cities()->save($city);
        });
    }
    public function updateCity($city)
    {
        $region = Region::findOrFail($this->region_id);
        $city->name =  $this->name;

        $region->cities()->save($city);
    }

}
