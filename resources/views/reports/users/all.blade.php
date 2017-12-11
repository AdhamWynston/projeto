<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Relatório de Usuários</title>
</head>
<body>
<div class="container">
    <div align="center">
        <h1>Relatório de usuários</h1>
    </div>
    <div class="row">
        <div>
            <h4>Data da emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h4>
        </div>
        <div align="center">
            <h3>Tabela de  <small>Usuários</small></h3>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Permissão</th>
                </tr>
        @foreach ($users as $user)
            <tr>
                <td id="celula1">{{$user->name}}</td>
                <td id="celula4">{{$user->email}}</td>
                @if($user->role === 1)
                <td id="celula3">Administrador</td>
                    @else
                    <td id="celula3">Coordenador</td>
                @endif
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
    .page-number:after {
        content: counter(page);
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
    h4 {
        display: block;
        font-size: 1em;
        margin-top: 1.33em;
        margin-bottom: 1.33em;
        margin-left: 0;
        margin-right: 0;
        font-weight: bold;
    }
    h5 {
        display: block;
        font-size: .83em;
        margin-top: 1.67em;
        margin-bottom: 1.67em;
        margin-left: 0;
        margin-right: 0;
        font-weight: bold;
    }
</style>
</body>
</html>