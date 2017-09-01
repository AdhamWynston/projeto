<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
       $client = Client::paginate(5);
        return response()->json($client);
    }


    public function store(Request $request)
    {
       $client = Client::create($request->all());
        return response()->json($client);
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
