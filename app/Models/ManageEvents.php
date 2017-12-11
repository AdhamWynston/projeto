<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageEvents extends Model
{
    protected $table = 'manage_events';
    protected $fillable = [
        'check_in',
        'check_out',
        'employee_id',
        'event_id'
    ];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
    public function employeeOrderName()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id')->orderBy('id', 'desc');
    }
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
