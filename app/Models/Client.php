<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['residency_city', 'address',  'mobile', 'phone', 'point_id', 'user_id'];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }


}
