<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'document',
        'state',
        'city',
        'zip_code',
        'street',
        'neighborhood',
        'number',
        'complement',
        'phone',
        'phoneAlternative',
        'email',
        'status'
    ];
}
