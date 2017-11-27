<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Event;
use App\Models\ManageEvents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageEventsController extends Controller
{
    public function index(Request $request)
    {
        $result = ManageEvents::with('event')
            ->get();
        return response()->json($result);
    }
    public function checkListEmployeeFrequency ($id)
    {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->pluck('id');
        $employees = DB::table('employees')
            ->join('manage_events', 'employees.id', '=', 'manage_events.employee_id')
            ->whereIn('manage_events.id', $event)
            ->get();
        return response()->json($employees);
    }
    public function employeeCheckedinList ($id)
    {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->whereNotNull('check_in')
            ->pluck('employee_id');
        return response()->json($event);
    }
    public function teste ()
    {
        $to = Carbon::now()->format('Y-m-d H:m:s');
        $from = Carbon::now()->addDay(1)->format('Y-m-d H:m:s');
        $result = Event::where('startDate', '>=', $to)
            ->where('startDate', '<=', $from)->pluck('id');
        $data = [
            'status' => 3
        ];
        $teste = Event::whereIn('id', $result)->update($data);
        return response()->json($teste);
    }
    public function employeeCheckedoutList ($id)
    {
        $event = ManageEvents::with('employee')
            ->where('event_id', '=', $id)
            ->whereNotNull('check_out')
            ->pluck('employee_id');
        return response()->json($event);
    }

    public function employeeList ($id)
    {
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

    public function show($id)
    {
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
    protected function relationships()
    {
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}
