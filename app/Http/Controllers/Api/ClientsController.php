<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Validator;


class ClientsController extends Controller
{
    protected $model;
    use ApiControllerTrait;
    public function __construct(Client $model)
    {
        $this->model = $model;
    }
    public function clientEvents ($id) {
        $client = Client::findOrFail($id);
        $events = $client->events()->get();
        return response()->json($events);
    }
    public function index (Request $request) {
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
        $result = Client::orderBy($order[0],$order[1])
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
        $this->validate($request,[
            'name' => 'string|required',
            'email' => 'email|unique:clients|required',
            'type' => 'required|integer',
            'document' => 'required|cpf_cnpj',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
            'complement' => 'nullable',
            'phone' => 'required',
            'phoneAlternative' => 'nullable'
        ]);
        $data = $request->all();

        $client = new Client();

        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->type = $data['type'];
        $client->document = $data['document'];
        $client->state = $data['state'];
        $client->city = $data['city'];
        $client->zip_code = $data['zip_code'];
        $client->street = $data['state'];
        $client->neighborhood = $data['neighborhood'];
        $client->number = $data['number'];
        $client->complement = (array_key_exists('complement',$data)) ? $data['complement'] :  null;
        $client->phone = $data['phone'];
        $client->phoneAlternative = (array_key_exists('phoneAlternative',$data)) ? $data['phoneAlternative'] :  null;

        $client->save();

        return response()->json($client);
    }
    public function show($id){
        $client = Client::findOrFail($id);
        return response()->json($client);
    }
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return response()->json($client);
    }
}
