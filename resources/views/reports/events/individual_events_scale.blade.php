<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório Individual</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div>
            <h4>Data da emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h4>
        </div>
            <div align="center">
                <h1>Relatório do Evento:  <small>{{ $data['event']->name }}</small></h1>
            </div>
            <div>
                <h3>Situação: <small>
                        @if($data['event']->status === 1)
                            <span> Pendente </span>
                        @elseif($data['event']->status === 2)
                            <span> Aguardando </span>
                        @elseif($data['event']->status === 3)
                            <span>Em andamento</span>
                        @elseif($data['event']->status === 4)
                            <span>Realizado</span>
                        @elseif($data['event']->status === 5)
                            <span>Cancelado</span>
                        @endif
                    </small></h3>
            </div>
            <table border="1">
                <tr>
                    <th class="tg-center">Dados do Cliente</th>
                </tr>
                <tr>
                    <td>
                        <div><b>Cliente:</b> {{ $data['event']->client->name }}</div>
                        <div><b>E-mail:</b> {{ $data['event']->client->email }}</div>
                        <div><b>Telefone: </b> {{ $data['event']->client->phone }}</div>
                        @if($data['event']->client->phoneAlternative !== null)
                            <span><b>Telefone Alternativo: </b> {{ $data['event']->client->phoneAlternative }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="tg-center">Informações do Evento</th>
                </tr>
                <tr>
                    <td>
                        <div><b>Inicío:</b> {{ Carbon\Carbon::parse($data['event']->startDate)->format('d/m/Y H:i') }}</div>
                        <div><b>Termíno:</b> {{ Carbon\Carbon::parse($data['event']->endDate)->format('d/m/Y H:i') }}</div>
                        <div><b>Duração:</b> {{ Carbon\Carbon::parse($data['event']->endDate)->diffInHours(Carbon\Carbon::parse($data['event']->startDate)) }} Horas</div>
                        <div><b>Quantidade de Seguranças:</b> {{ $data['event']->quantityEmployees }}</div>
                        @if($data['event']->observations !== null)
                            <div><b>Observações:</b> {{ $data['event']->observations }}</div>
                            @else
                            <div><b>Observações: </b>Não foi registrado observações</div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="tg-center">Local do Evento</th>
                </tr>
                <tr>
                    <td>
                        <div><b>Local:</b> {{ $data['event']->local }}</div>
                        <span><b>Cidade:</b> {{ $data['event']->city }}</span>
                        <span><b>-</b> {{ $data['event']->state }}  </span>
                        <div><b>   CEP:</b>{{ $data['event']->zip_code }}</div>
                        <br>
                        @if($data['event']->client->phoneAlternative !== null)
                            <span><b>Telefone Alternativo: </b> {{ $data['event']->client->phoneAlternative }}</span>
                        @endif
                    </td>
                </tr>
            </table>
    </div>
</div>
<div style="page-break-after: always"></div>
<div>
    <div>
        <h4>Data da emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h4>
    </div>
    <div align="center">
        <h2>Escala para o evento</h2>
    </div>
        <table align="center">
            <tr>
                <th align="center">Nome</th>
                <th align="center">CPF</th>
                <th align="center">Telefone</th>
                <th align="center">E-mail</th>
            </tr>
            @foreach($data['manage'] as $employee)
                @php($end = Carbon\Carbon::parse($employee->check_out); $start = Carbon\Carbon::parse($employee->check_in);)
                @endphp
                <tr>
                    <td id="celula1" align="center">{{$employee->employee->name}}</td>
                    <td id="celula2" align="center">{{ cpf($employee->employee->document) }}</td>
                    <td id="celula3" align="center">{{ $employee->employee->phone }}</td>
                    <td id="celula4" align="center">{{ $employee->employee->email }}</td>
                </tr>
            @endforeach
        </table>
</div>

<!-- Scripts -->
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
    }
    .quebrapagina {
        page-break-before: always;
    }
    #celula1 {
        width: 190px;
        _width: 255px;
    }
    #celula2 {
        width: 120px;
        _width: 255px;
    }
    #celula3 {
        width: 150px;
        _width: 255px;
    }
    #celula4 {
        width: 160px;
        _width: 255px;
    }
    #celula5 {
        width: 80px;
        _width: 255px;
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