<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['priority', 'value', 'state', 'validated', 'finished_user', 'reasons_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopePending($query)
    {
        $credits = $query->with('user.client.point.city')->where('state', 0);

        if (auth()->user()->isPoint()) {
            $credits->where('point', 1);
        }

        return $credits;
    }

    public function getPriorityNameAttribute()
    {
        return $this->priority ? 'Alta' : 'Baja';
    }
}
