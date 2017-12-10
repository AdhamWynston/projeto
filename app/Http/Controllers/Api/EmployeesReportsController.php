<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use App\Models\Event;
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
    public function reportIndividual (Request $request) {
        $data = $request->all();
        $this->validate($request,[
            'name'=> 'required|exists:employees|string',
        ]);
        $order = (array_key_exists('order', $data) && $data['order'] != 'undefined') ? $data['order'] : null;
        $startDate = (array_key_exists('startDate', $data) && $data['startDate'] != 'undefined') ? $data['startDate'] : null;
        $endDate = (array_key_exists('endDate', $data) && $data['endDate'] != 'undefined') ? $data['endDate'] : null;
        $employee = Employee::where('name', $data['name'])
            ->get();
        $employee_id = $employee['id'];
        if($startDate != null && $endDate != null) {
            $events = Event::whereBetween('startDate', [$startDate, $endDate])
                ->orWhereBetween('endDate', [$startDate, $endDate])
                ->orderBy($order)
                ->with(['manageEvents' => function ($query) use ($employee_id) {
                    $query->where('employee_id', $employee_id);
                }])
                ->get();
            $data = array(
                'employee' => $employee,
                'events' => $events
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.employees.individual_events');
        }
        else {
            $events = Event::orderBy($order)
                ->with(['manageEvents' => function ($query) use ($employee_id) {
                    $query->where('employee_id', $employee_id);
                }])
                ->has('manageEvents')
                ->get();
            $data = array(
                'employee' => $employee,
                'events' => $events
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.employees.individual_events');
        }
        $name = "funcionario-" . $employee_id. Carbon::now() . ".pdf";
        return $pdf->stream($name);
//        }
//        return response()->json($data['events'][0]->manage_events);
    }
}
