<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditHistory extends Model
{
    protected $fillable = ['name', 'last_name', 'email', 'other_mail',
        'document_type', 'document', 'residency_city', 'address', 'mobile','phone', 'name_reference_1',
        'phone_reference_1','name_reference_2','phone_reference_2','files','user_id'];
}
