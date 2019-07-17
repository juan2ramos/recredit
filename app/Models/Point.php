<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
