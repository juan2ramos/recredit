<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
}
