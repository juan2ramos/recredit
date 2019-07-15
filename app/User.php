<?php

namespace App;

use App\Models\Client;
use App\Models\Credit;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'document_type', 'document', 'verification_code'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'document';
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {

            $user->references()->delete();
            $user->userFiles->each->delete();
            $user->client()->delete();

        });
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function credit()
    {
        return $this->hasOne(Credit::class);
    }


    public function hasCredit()
    {
        return !empty($this->load('credit')->credit);
    }

    public function hasClient()
    {
        return !empty($this->load('client')->client);
    }

    public function isClient()
    {
        return $this->hasRole('Credit') || $this->hasRole('Entrepreneur');
    }

    public function isAdmin()
    {
        return $this->hasRole('SuperAdmin') || $this->hasRole('Analysts') || $this->hasRole('Point');
    }

}
