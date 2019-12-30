<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $fillable = ['documentValidation', 'authorization', 'fingerprint', 'observation', 'other', 'dataCredit'];
}
