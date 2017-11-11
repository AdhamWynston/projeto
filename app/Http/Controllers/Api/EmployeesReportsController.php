<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
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
}
