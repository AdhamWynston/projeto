<?php

namespace App\Http\Controllers\Api;
use JansenFelipe\CnpjGratis\CnpjGratis;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Person;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
       $clients = Person::all()->where('defaulting',1);
        return view('clients.index', compact('clients'));
    }

    public function create(){

        return view('clients.create', compact('params'));
    }

    public function store(ClientRequest $request)
    {
             $person = Person::create($request->all());

            $client = Client::create();
            $data = $person->personable()->associate($client);
            $data->save();
             return redirect()->route('clients.index');

    }


    public function show($id)
    {
       $client = Client::findOrFail($id);
        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
       $client = Client::findOrFail($id);
       $client->fill($request->all());
       $client->save;
        return response()->json($client);
    }

    public function destroy($id)
    {
       $client = Client::findOrFail($id);
       $client->delete();
        return response()->json(['message'=>'Removido com sucesso!']);
    }
}
