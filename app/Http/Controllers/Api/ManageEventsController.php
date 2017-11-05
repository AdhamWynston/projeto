<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ManageEvents;
use Illuminate\Http\Request;

class ManageEventsController extends Controller
{
    public function index(Request $request)
    {
        $result = ManageEvents::with('event')
            ->get();
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $result = $request->all();
        $employees = $result['employees'];
        $eventId = $result['event_id'];
        foreach ($employees as $employee) {
            $data = [
                'employee_id' => $employee,
                'event_id' => $eventId
            ];
            ManageEvents::create($data);
        }
        return response()->json($employees);

    }
    public function show($id){
        $result = ManageEvents::where('event_id', '=', $id)->get();
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {
        $result = ManageEvents::findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    public function checkDate(Request $request)
    {
        $result = $request->all();
        $startDate = $result['startDate'];
        $endDate = $result['endDate'];
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
        $available = $countEmployees - $countEmployeeEvent;
        $date = ['quantity' => $available];
        return response()->json($date);
    }
    protected function relationships(){
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}
