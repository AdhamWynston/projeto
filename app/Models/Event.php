<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'name',
        'local',
        'zip_code',
        'city',
        'state',
        'duration',
        'quantityEmployees',
        'observations',
        'status',
        'startDate',
        'endDate',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
