<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    ];
    public function person(){
        return $this->morphOne(Person::class,'personable');
    }
}
