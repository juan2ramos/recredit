<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = ['name', 'url', 'user_id'];

    protected $appends = ['metaData', 'temporaryUrl'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($file) {
            Storage::disk('spaces')->delete($file->url);
        });
    }

    public function getMetaDataAttribute()
    {
        return Storage::getMetaData($this->url);
    }

    public function getTemporaryUrlAttribute()
    {
        return Storage::temporaryUrl($this->url, now()->addMinutes(5));
    }
}
