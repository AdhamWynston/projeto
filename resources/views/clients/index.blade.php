@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Listagem de Clientes</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td> {{ $client->id }}</td>
                        <td> {{ $client->name }}</td>
                        <td> {{ $client->document }}</td>
                        <td> {{ $client->phone }}</td>
                        <td>Ações</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
