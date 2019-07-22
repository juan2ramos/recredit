<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $appends = ['full_name'];
    protected $fillable = ['name', 'trade_name','cost_center', 'is_entrepreneur','is_credit', 'state', 'city_id'];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return "$this->trade_name $this->name";
    }
}
