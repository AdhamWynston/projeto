<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\View\View;

class EmployeeReportsController extends Controller
{
    public function index ()
    {
        $clients = Client::all();
        return view('reports.events.individual', compact('clients'));
    }
    public function download(){
        $clients = Client::all();
        view()->share('clients', $clients);
        $pdf = PDF::loadView('reports.events.individual');
        return $pdf->stream('htmltopdfview.pdf');
    }
}
