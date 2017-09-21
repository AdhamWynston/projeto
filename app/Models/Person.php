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
        'references',
        'phone',
        'phoneAlternative',
        'email',
    ];
    public function personable(){
        return $this->morphTo();
    }
//    public function individualQuery(){
//        return $this->morphedByMany(IndividualEntity::class,'personable');
//    }
//    public function legalQuery(){
//        return $this->morphedByMany(LegalEntity::class,'personable');
//    }
//    public function getIndividualAttribute(){
//        return $this->individualQuery()->first();
//    }
//    public function getLegalAttribute(){
//        return $this->legalQuery()->first();
//    }
}
