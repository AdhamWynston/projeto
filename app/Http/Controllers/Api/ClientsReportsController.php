<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\Event;
use App\Models\ManageEvents;
use Carbon\Carbon;
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
    public function reportAll (Request $request) {
        $data = $request->all();
        $order = (array_key_exists('order', $data) && $data['order'] != 'undefined') ? $data['order'] : 'name';
        $status = (array_key_exists('status', $data) && $data['status'] != 'undefined') ? $data['status'] : null;
        if ($status != null) {
            $clients = Client::where('status', $status)
                ->orderBy($order)
                ->get();
        }
        else {
            $clients = Client::orderBy($order)->get();
        }
        view()->share('clients', $clients);
        $pdf = PDF::loadView('reports.clients.all');
        $name = "clientes-" . Carbon::now() . ".pdf";
        return $pdf->stream($name);
    }
    public function reportIndividual (Request $request) {
        $data = $request->all();
        $this->validate($request,[
            'name'=> 'required|exists:clients|string',
        ]);
        $order = (array_key_exists('order', $data) && $data['order'] != 'undefined') ? $data['order'] : null;
        $startDate = (array_key_exists('startDate', $data) && $data['startDate'] != 'undefined') ? $data['startDate'] : null;
        $endDate = (array_key_exists('endDate', $data) && $data['endDate'] != 'undefined') ? $data['endDate'] : null;
        $client = Client::where('name', $data['name'])
            ->get();
        $client_id = $client[0]['id'];
        if($startDate != null && $endDate != null) {
            $events = Event::where('client_id', $client_id)
                ->whereBetween('startDate', [$startDate, $endDate])
                ->orWhereBetween('endDate', [$startDate, $endDate])
                ->orderBy($order)
                ->get();
            $data = array(
                'client' => $client,
                'events' => $events
            );
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.clients.individual_events');
        }
        else {
            $events = Event::where('client_id', $client_id)
                ->get();
            $data = array(
                'client' => $client,
                'events' => $events
            );
            view()->share('data', $data);

            $pdf = PDF::loadView('reports.clients.individual_events');
        }
        $name = "cliente-" . $client_id. Carbon::now() . ".pdf";
//        $font = $pdf->getFontMetrics()->get_font("helvetica", "bold");
//        $pdf->getCanvas()->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));
        return $pdf->stream($name);
//        }
//        return response()->json($data);
    }
}
