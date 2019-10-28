<?php

namespace App\Modules\Admin\Request;

use App\Models\Point;
use Illuminate\Foundation\Http\FormRequest;


class PointRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->isSuperAdmin() || $this->user()->isAnalysts();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'trade_name' => 'required',
            'cost_center' => 'required',
            'city' => 'required',
        ];
    }

    public function createPoint()
    {
        $data = $this->all();
        $data['city_id'] = $this->input('city');
        $data['is_credit'] = $this->input('is_credit') ? 1 : 0;
        $data['is_entrepreneur'] = $this->input('is_entrepreneur') ? 1 : 0;
        Point::create($data);
    }

    public function updatePoint($point)
    {
        $data = $this->all();
        $data['city_id'] =  $this->input('city');
        $data['is_credit'] = $this->input('is_credit') ? 1 : 0;
        $data['is_entrepreneur'] = $this->input('is_entrepreneur') ? 1 : 0;

        $point->update($data);
    }

}
