<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    public function user(){
        return $this->morphOne(User::class,'userable');
    }
}
