<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
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
    public function person(){
        return $this->morphOne(Person::class,'personable');
    }
}
