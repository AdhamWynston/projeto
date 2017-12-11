<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Funcionários</title>
</head>
<body>
<div class="container">
    <div align="center">
        <h1>Relatório de Funcionários</h1>
    </div>
    <div class="row">
        <div>
            <h4>Data da emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h4>
        </div>
        <div align="center">
            <h3>Tabela de  <small>Funcionários</small></h3>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Nome</th>
                    <th>Documento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
                @foreach ($employees as $employee)
                    <tr>
                        <td id="celula1">{{$employee->name}}</td>
                        <td id="celula2">{{ cpf($employee->document)}}</td>
                        <td id="celula4">{{$employee->email}}</td>
                        <td id="celula3">{{$employee->phone}}</td>
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