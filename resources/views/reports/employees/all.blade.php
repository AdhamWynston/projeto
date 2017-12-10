<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório Individual</title>
</head>
<body>
<div class="container">
    <div align="center">
        <h1>Relatório de todos funcionários</h1>
    </div>
    <div class="row">
        @foreach ($employees as $employee)
            <div align="center">
                <h3>Funcionário:  <small>{{ $employee->name }}</small></h3>
            </div>
            <div>
                <h3>Situação: <small>
                        @if($employee->status === 1)
                            <span> Ativado </span>
                        @elseif($employee->status === 0)
                            <span> Desativado </span>
                        @endif
                    </small></h3>
            </div>
            <table border="1">
                <tr>
                    <th class="tg-center">Dados Pessoais</th>
                </tr>
                <tr>
                    <td>
                        <div><b>CPF:</b> {{ cpf($employee->document) }}</div>
                        <div><b>E-mail:</b> {{ $employee->email }}</div>
                        <div><b>Telefone: </b> {{ $employee->phone }}</div>
                        @if($employee->phoneAlternative !== null)
                            <span><b>Telefone Alternativo: </b> {{ $employee->phoneAlternative }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="tg-center">Endereço</th>
                </tr>
                <tr>
                    <td>
                        <div><b>CEP:</b> {{ $employee->zip_code }}</div>
                        <span><b>Cidade:</b> {{ $employee->city }}</span>
                        <span><b>-</b> {{ $employee->state }}  </span>
                        <div><b>Rua: </b> {{ $employee->street }}</div>
                        <div><b>Setor: </b> {{ $employee->neighborhood }}</div>
                        <div><b>Número: </b> {{ $employee->number }}</div>
                        @if($employee->complement !== null)
                            <div><b>Complemento: </b> {{ $employee->complement }}</div>
                            @endif
                    </td>
                </tr>
            </table>
    </div>
    <br class="quebrapagina">
    @endforeach
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
    .tg-center {
        text-align: center;
    }
</style>
</body>
</html>