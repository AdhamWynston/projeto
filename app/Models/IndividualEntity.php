<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualEntity extends Model
{
    protected $fillable = [
        'cpf'
    ];
    public function client(){
        return $this->hasOne(Client::class, 'individual_entity_id');
    }
    public function person(){
        return $this->morphOne(Person::class,'personable');
    }
//    public function personQuery(){
//        return $this->morphToMany(Person::class,'personable');
//    }
//    public function getPersonAttribute(){
//        return $this->personQuery()->first();
//    }
}
