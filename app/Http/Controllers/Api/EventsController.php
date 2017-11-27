<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Event;
use function foo\func;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $model;
    protected $relationships=['client'];

    public function __construct(Event $model)
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
        $order[0] = $order[0] ?? 'status';
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
        $result = $this->model->create($request->all());
        return response()->json($result);

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
