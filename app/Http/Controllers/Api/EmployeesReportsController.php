<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Models\ManageEvents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class EmployeesReportsController extends Controller
{
    public function individual ($id) {
        $employees = Employee::where('id', $id)->get();
        view()->share('employees', $employees);
        $pdf = PDF::loadView('reports.employees.individual');
        $name = "funcionario-" . $id . ".pdf";
        return $pdf->stream($name);
    }
    public function report (Request $request) {
        $data = $request->all();
        $this->validate($request,[
            'name'=> 'required|exists:employees|string',
        ]);
        if (array_key_exists('personal', $data) && array_key_exists('events', $data) ) {
            $employee = Employee::where('name', $data['name'])
                ->get();
            $id = $employee[0]['id'];
            $events = ManageEvents::where('employee_id', $id)
                ->with('event')
                ->get();
            $data = array (
                'employee' => $employee,
                'events' => $events
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.employees.individual_events');
        }
        else if (array_key_exists('personal', $data)) {
            $employee = Employee::where('name', $data['name'])
                ->get();
            $id = $employee[0]['id'];
            $data = array (
                'employee' => $employee
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.employees.individual_events');
        }
        $name = "funcionario-" . $id . Carbon::now() . ".pdf";
        return $pdf->stream($name);
//        return response()->json($events);
    }
}
