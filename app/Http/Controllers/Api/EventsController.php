<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $model;
    protected $relationships=['client'];

    use ApiControllerTrait;
    public function __construct(Event $model)
    {
        $this->model = $model;
    }
    public function checkDate(Request $request)
    {
        $result = $request->all();
        $startDate = $result['startDate'];
        $endDate = $result['endDate'];
        $quantityEmployee = $result['quantityEmployees'];
        $countEmployees = Employee::where('status', '=', 1)->count();
        $countEmployeeEvent = 0;
        $events = Event::
        where('status', '=', 1)
            ->where('startDate', '>=', $startDate)
            ->where('endDate', '<=', $endDate)
            ->get();
        foreach ($events as $event) {
            $countEmployeeEvent += $event->quantityEmployees;
        }
        $totalEmployeeCalculate = $countEmployeeEvent + $quantityEmployee;
        if($totalEmployeeCalculate > $countEmployees){
            return response()->json(false);
        }
        return response()->json(true);
    }
}
