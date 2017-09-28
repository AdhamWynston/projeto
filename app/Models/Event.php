<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}
