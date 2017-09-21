<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function individualEntity(){
        return $this->belongsTo(IndividualEntity::class, 'individual_entity_id');
    }
    public function legalEntity(){
        return $this->belongsTo(LegalEntity::class, 'legal_entity_id');
    }
}
