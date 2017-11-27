<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
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
        'defaulting'
    ];
    public function personable()
    {
        return $this->morphTo('personable');
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
