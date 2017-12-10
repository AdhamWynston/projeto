<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Clientes</title>
</head>
<body>
<div class="container">
    <div align="center">
        <h1>Relatório de clientes</h1>
    </div>
    <div class="row">
        <div align="center">
            <h3>Tabela de  <small>Clientes</small></h3>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Documento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
        @foreach ($clients as $client)
            <tr>
                <td id="celula1">{{$client->name}}</td>
                <td id="celula2">{{ cpf($client->document)}}</td>
                <td id="celula4">{{$client->email}}</td>
                <td id="celula3">{{$client->phone}}</td>
            </tr>
                @endforeach
            </table>
    </div>
</div>
</div>
<!-- Scripts -->
<style>
    .quebrapagina {
        page-break-before: always;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 10px;
    }
    #celula1 {
        width: 180px;
        _width: 255px;
    }
    #celula2 {
        width: 140px;
        _width: 255px;
    }
    #celula3 {
        width: 120px;
        _width: 255px;
    }
    #celula4 {
        width: 100px;
        padding:10px;
        _width: 255px;
    }
    .tg-center {
        text-align: center;
    }
</style>
</body>
</html>