<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class ClientsReportsController extends Controller
{
    public function individual ($id) {
        $clients = Client::where('id', $id)->get();
        view()->share('clients', $clients);
        $pdf = PDF::loadView('reports.clients.individual');
        $name = "cliente-" . $id . ".pdf";
        return $pdf->stream($name);
    }
}
