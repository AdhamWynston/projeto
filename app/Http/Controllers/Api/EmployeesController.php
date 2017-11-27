<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    protected $model;
    use ApiControllerTrait;
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }
    public function index(Request $request) {
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
        $result = Employee::orderBy($order[0],$order[1])
            ->where(function($query) use ($like){
                if($like){
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->where($where)
            ->get();
        return response()->json($result);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'email' => 'email|unique:employees|required',
            'document' => 'required',
            'state' => 'required|string|min:2|max:2',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'street' => 'required|string',
            'neighborhood' => 'required|string',
            'number' => 'required|string',
            'complement' => 'nullable|string',
            'phone' => 'required|string',
            'phoneAlternative' => 'nullable'
        ]);

        $data = $request->all();

        $employee = new Employee();

        $employee->name = $data['name'];
        $employee->email = $data['email'];
        $employee->document = $data['document'];
        $employee->state = $data['state'];
        $employee->city = $data['city'];
        $employee->zip_code = $data['zip_code'];
        $employee->street = $data['state'];
        $employee->neighborhood = $data['neighborhood'];
        $employee->number = $data['number'];
        $employee->complement = (array_key_exists('complement',$data)) ? $data['complement'] :  null;
        $employee->phone = $data['phone'];
        $employee->phoneAlternative = (array_key_exists('phoneAlternative',$data)) ? $data['phoneAlternative'] :  null;

        $employee->save();

        return response()->json($employee);
    }
    public function show($id){
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee);
    }
}
