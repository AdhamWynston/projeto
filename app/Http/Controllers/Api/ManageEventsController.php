<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ManageEvents;
use Illuminate\Http\Request;

class ManageEventsController extends Controller
{
    protected $model;
    protected $relationships=['event'];

    public function __construct(ManageEvents $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $limit = $request->all()['limit'] ?? 15;
        $order = $request->all()['order'] ?? null;

        if($order  !== null){
            $order = explode(',', $order);
        }
        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->all()['where'] ?? [];

        $like = $request->all()['like'] ?? null;

        if($like){
            $like = explode(',', $like);
            $like[1] = '%' . $like[1] . '%';
        }

        $result = $this->model->with($this->relationships())->orderBy($order[0],$order[1])
            ->where(function($query) use ($like){
                if($like){
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->with($this->relationships())
            ->where($where)
            ->get();
        return response()->json($result);
    }

    public function store(Request $request)
    {
        $result = $request->all();
        $employees = $result['employees'];
        $eventId = $result['event_id'];
        foreach ($employees as $employee) {
            $data = [
                'employee_id' => $employee,
                'event_id' => $eventId
            ];
            ManageEvents::create($data);
        }
        return response()->json($employees);

    }
    public function show($id){
        $result = $this->model->with($this->relationships())
            ->findOrFail($id);
        return response()->json($result);
    }

    public function update(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        $result->update($request->all());
        return response()->json($result);
    }

    public function checkDate(Request $request)
    {
        $result = $request->all();
        $startDate = $result['startDate'];
        $endDate = $result['endDate'];
        $countEmployees = Employee::where('status', '=', 1)->count();
        $countEmployeeEvent = 0;
        $events = Event::
        where('status', '=', 1)
            ->where('startDate', '>=', $startDate)
            ->where('endDate', '<=', $endDate)
            ->get();
        foreach ($events as $event) {
            $countEmployeeEvent += $event->quantityEmployees;
        }
        $available = $countEmployees - $countEmployeeEvent;
        $date = ['quantity' => $available];
        return response()->json($date);
    }
    protected function relationships(){
        if (isset($this->relationships)){
            return $this->relationships;
        }
        return [];
    }
}
