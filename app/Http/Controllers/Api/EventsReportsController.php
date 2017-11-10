<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ManageEvents;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class EventsReportsController extends Controller
{
    public function individual ($id) {
       $events = Event::where('id', $id)
           ->with('client')
           ->get();
        $manage = ManageEvents::where('event_id', $id)
            ->with('employee')
            ->get();
        $data = array (
            'manages' => $manage,
            'events' => $events
        );
        view()->share('data', $data);
        $pdf = PDF::loadView('reports.events.individual');
        $name = "relatorio-" . $id . ".pdf";
        return $pdf->stream($name);
    }
    public function teste ($id) {
        $events = Event::where('id', $id)
            ->with('client')
            ->get();
        $manage = ManageEvents::where('event_id', $id)
            ->with('employee')
            ->get();
        $data = array (
            'manages' => $manage,
            'events' => $events
        );
        return response()->json($manage);
    }
}
