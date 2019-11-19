<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:m:s',
        'check_date' => 'datetime:d-m-Y h:m:s'
    ];
    protected $appends = ['reconsideration'];
    protected $fillable = ['priority', 'state', 'validated', 'check_date',
        'number_requested', 'finished_user', 'assigned_user', 'reviewed_user', 'reasons_id', 'user_id', 'isEntrepreneurs', 'typing_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userReviewed()
    {
        return $this->belongsTo(User::class,'reviewed_user');
    }

    public function userFinish()
    {
        return $this->belongsTo(User::class,'finished_user');
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class, 'reasons_id');
    }

    public function typing()
    {
        return $this->belongsTo(Typing::class, 'typing_id');
    }

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_user');
    }

    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_user');
    }

    public function finished()
    {
        return $this->belongsTo(User::class, 'finished_user');
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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();

    }

    public function getReconsiderationAttribute()
    {
        $days = Carbon::now()->diffInDays($this->check_date);
        return $this->state == 2 && $days > 90;
    }

    public function getCheckDateAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();

    }

}
