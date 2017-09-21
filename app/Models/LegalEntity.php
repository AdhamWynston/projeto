<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    protected $fillable = [
        'cnpj'
    ];
    public function client(){
        return $this->hasOne(Client::class, 'legal_entity_id');
    }
    public function personQuery(){
        return $this->morphToMany(Person::class,'personable');
    }
    public function getPersonAttribute(){
        return $this->personQuery()->first();
    }
}
