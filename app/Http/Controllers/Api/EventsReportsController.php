<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ManageEvents;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
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
        $name = "evento-" . $id . ".pdf";
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
    public function reportAll (Request $request) {
        $data = $request->all();
        $order = (array_key_exists('order', $data) && $data['order'] != 'undefined') ? $data['order'] : 'name';
        $status = (array_key_exists('status', $data) && $data['status'] != 'undefined' && $data['status'] != 0) ? $data['status'] : null;
        $startDate = (array_key_exists('startDate', $data) && $data['startDate'] != 'undefined') ? $data['startDate'] : null;
        $endDate = (array_key_exists('endDate', $data) && $data['endDate'] != 'undefined') ? $data['endDate'] : null;
        if ($startDate !== null && $endDate !== null){
            if ($status !== null) {
                $events = Event::where('status', $status)
                    ->whereBetween('startDate', [$startDate, $endDate])
                    ->whereBetween('endDate', [$startDate, $endDate])
                    ->orderBy($order)
                    ->get();
            }
            else {
                $events = Event::whereBetween('startDate', [$startDate, $endDate])
                    ->whereBetween('endDate', [$startDate, $endDate])
                    ->orderBy($order)
                    ->get();
            }
        }
        else {
            if($status !== null) {
                $events = Event::where('status', $status)->orderBy($order)->get();
            }
            else {
                $events = Event::orderBy($order)->get();
            }
        }
        view()->share('events', $events);
        $pdf = PDF::loadView('reports.events.all');
       $name = "clientes-" . Carbon::now() . ".pdf";
        return $pdf->stream($name);
//        return response()->json($events);
    }
    public function reportIndividual (Request $request) {
        $data = $request->all();
        $this->validate($request,[
            'id'=> 'required|exists:clients',
            'type' => 'required'
        ]);
        $type = (array_key_exists('type', $data) && $data['type'] != 'undefined') ? $data['type'] : null;
        $event = Event::where('id', $data['id'])
            ->with('client')
            ->firstOrFail();
        $scale = $event->manageEvents()
            ->with('employee')
            ->get();
        $data = array (
            'manage' => $scale,
            'event' => $event
        );
        if ($type === 'fullScale') {
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.events.individual_events_fullscale');
        }
        else if ($type === 'scale') {
            view()->share('data', $data);
            $pdf = PDF::loadView('reports.events.individual_events_scale');
        }
        else {

        }
        $name = "evento-" . $event->id. Carbon::now() . ".pdf";
        return $pdf->stream($name);
//        return response()->json($data);
    }
}
