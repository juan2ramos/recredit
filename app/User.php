<?php

namespace App;

use App\Models\Client;
use App\Models\Credit;
use App\Models\File;
use App\Models\Point;
use App\Models\Reference;
use Carbon\Carbon;
use Carbon\Traits\Date;
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
            $user->files->each->delete();
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

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function point()
    {
        return $this->hasOne(Point::class);
    }

    public function hasCredit()
    {
        return !empty($this->load('credit')->credit);
    }

    public function hasClient()
    {
        return !empty($this->load('client')->client);
    }

    public function hasReferences()
    {
        return !$this->load('references')->references->isEmpty();
    }

    public function hasFiles()
    {
        return !$this->load('files')->files->isEmpty();
    }

    public function isAdmin()
    {
        return $this->hasRole('SuperAdmin') || $this->hasRole('Analysts') || $this->hasRole('Point') || $this->hasRole('Documentary') ;
    }

    public function isAnalysts()
    {
        return $this->hasRole('SuperAdmin') || $this->hasRole('Analysts');
    }
    public function isDocumentary()
    {
        return $this->hasRole('SuperAdmin') || $this->hasRole('Documentary');
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('SuperAdmin');
    }

    public function isPoint()
    {
        return $this->hasRole('Point');
    }

    public function isClient()
    {
        return $this->hasRole('Credit') || $this->hasRole('Entrepreneur');
    }


    public function scopeSearch($query, $search)
    {
        $clients = $query->where(function ($query) use ($search) {
            return $query->where('email', 'like', '%' . $search . '%')
                ->OrWhere('document', 'like', '%' . $search . '%');
        });

        if (auth()->user()->isPoint()) {
            $clients = $clients->whereHas('client', function ($query) {
                $query->whereHas('point', function ($query) {
                    $query->where('id', auth()->user()->point->id);
                });
            });
        }

        return $clients;
    }

}
