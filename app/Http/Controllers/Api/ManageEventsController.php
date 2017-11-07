<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Event;
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
    public function employeeListCheck ($id) {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->pluck('employee_id');
        $employees = Employee::whereIn('id', $event)->get();
        return response()->json($employees);
    }
    public function employeeCheckin ($id) {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->whereNotNull('check_in')
            ->pluck('employee_id');
        return response()->json($event);
    }
    public function employeeCheckout ($id) {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->whereNotNull('check_out')
            ->pluck('employee_id');
        return response()->json($event);
    }
    public function employeeList ($id) {
        $event = Event::findOrFail($id);
        $startDate = $event->startDate;
        $endDate = $event->endDate;
        $events = Event::where('startDate', '>=', $startDate)
            ->where('endDate', '<=', $endDate)
            ->with('manageEvents')
            ->pluck('id');
        $employeeEventSelected = ManageEvents::select('employee_id')
            ->where('event_id', '=', $id)
            ->pluck('employee_id');
        $employeeEventSelected = Employee::whereIn('id',$employeeEventSelected)->get();
        $employeesBusy = ManageEvents::select('employee_id')
            ->whereIn('event_id',$events)->get();
        $employeesFree = Employee::
        whereNotIn('id', $employeesBusy)
            ->where('status', '=', 1)
            ->get();
        $employeesFree = $employeeEventSelected->merge($employeesFree);
        return response()->json($employeesFree);
    }
    public function storeCheckin(Request $request)
    {
        $result = $request->all();
        $employees = $result['employees'];
        $eventId = $result['event_id'];
    }
    public function store(Request $request)
    {
        $result = $request->all();
        $employees = $result['employees'];
        $eventId = $result['event_id'];
        ManageEvents::where('event_id', '=', $eventId)->delete();
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

    public function check($id)
    {
        $result = ManageEvents::select('employee_id')
            ->where('event_id', '=', $id)
            ->pluck('employee_id')
        ;
        return response()->json($result);
    }
    protected function relationships(){
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}
