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
    public function reportAll (Request $request) {
        $data = $request->all();
        $order = (array_key_exists('order', $data) && $data['order'] != 'undefined') ? $data['order'] : 'name';
        $status = (array_key_exists('status', $data) && $data['status'] != 'undefined') ? $data['status'] : null;
        if ($status != null) {
            $employees = Employee::where('status', $status)
                ->orderBy($order)
                ->get();
        }
        else {
            $employees = Employee::orderBy($order)->get();
        }
        view()->share('employees', $employees);
        $pdf = PDF::loadView('reports.employees.all');
        $name = "funcionarios-" . Carbon::now() . ".pdf";
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
        $employee_id = $employee[0]['id'];
        if($startDate != null && $endDate != null) {
            $events = ManageEvents::where('employee_id', $employee_id)
                ->with(['event' => function ($query) use ($startDate, $endDate, $order){
                    $query->whereBetween('startDate', [$startDate, $endDate]);
                    $query->orWhereBetween('endDate', [$startDate, $endDate]);
                    $query->orderBy($order);
                }])
                ->has('event')
                ->get();
            $data = array(
                'employee' => $employee,
                'events' => $events
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.employees.individual_events');
        }
        else {
            $events = ManageEvents::where('employee_id', $employee_id)
                ->with('event')
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
//        return response()->json($data['events']);
    }
}
