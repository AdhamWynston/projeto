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
        @foreach ($data['events'] as $event)
        <div align="center">
            <h1>Relatório do Evento:  <small>{{ $event->name }}</small></h1>
        </div>
        <div>
            <h3>Situação: <small>
                    @if($event->status === 1)
                        <span> Pendente </span>
                    @elseif($event->status === 2)
                        <span> Aguardando </span>
                    @elseif($event->status === 3)
                        <span>Em andamento</span>
                    @elseif($event->status === 4)
                        <span>Realizado</span>
                    @elseif($event->status === 5)
                        <span>Cancelado</span>
                    @endif
                </small></h3>
        </div>
        <table border="1">
            @if($event->status === 5)
            <tr>
                <th class="tg-center">Detalhes</th>
            </tr>
            <tr>
                <td>
                    <div><b>Motivo do cancelamento:</b> {{ $event->observations }}</div>
                </td>
            </tr>
            @endif
            <tr>
                <th class="tg-center">Dados do Cliente</th>
            </tr>
            <tr>
                <td>
                    <div><b>Cliente:</b> {{ $event->client->name }}</div>
                    <div><b>E-mail:</b> {{ $event->client->email }}</div>
                    <div><b>Telefone: </b> {{ $event->client->phone }}</div>
                    @if($event->client->phoneAlternative !== null)
                        <span><b>Telefone Alternativo: </b> {{ $event->client->phoneAlternative }}</span>
                        @endif
                </td>
            </tr>
            <tr>
                <th class="tg-center">Informações do Evento</th>
            </tr>
            <tr>
                <td>
                    <div><b>Inicío:</b> {{ Carbon\Carbon::parse($event->startDate)->format('d/m/Y H:i') }}</div>
                    <div><b>Termíno:</b> {{ Carbon\Carbon::parse($event->endDate)->format('d/m/Y H:i') }}</div>
                    <div><b>Duração</b> {{ $event->duration }} Horas</div>
                    <div><b>Quantidade de Seguranças:</b> {{ $event->quantityEmployees }}</div>
                    @if($event->status !== 5)
                    <div><b>Observações:</b> {{ $event->observations }}</div>
                        @endif
                </td>
            </tr>
            <tr>
                <th class="tg-center">Local do Evento</th>
            </tr>
            <tr>
                <td>
                    <div><b>Local:</b> {{ $event->local }}</div>
                    <span><b>Cidade:</b> {{ $event->city }}</span>
                    <span><b>-</b> {{ $event->state }}  </span>
                    <span><b>   CEP:</b>{{ $event->zip_code }}</span>
                    <br>
                    @if($event->client->phoneAlternative !== null)
                        <span><b>Telefone Alternativo: </b> {{ $event->client->phoneAlternative }}</span>
                    @endif
                </td>
            </tr>
            @if($event->status !== 1 && $event->status !== 5)
            <tr>
                    <table>
                        @if($event->status === 3)
                            <tr>
                                <th align="center" colspan="5">Frequência dos funcionários escalados</th>
                            </tr>
                            <tr>
                                <th align="center">Nome</th>
                                <th align="center">CPF</th>
                                <th align="center">Entrada</th>
                                <th align="center">Sáida</th>
                                <th align="center">CH</th>
                            </tr>
                            @foreach($data['manages'] as $employee)
                                <tr>
                                    <td align="center">{{$employee->employee->name}}</td>
                                    <td align="center">{{ cpf($employee->employee->document) }}</td>
                                    <td align="center">{{$employee->employee->phone}}</td>
                                    <td align="center">{{ cpf($employee->employee->document) }}</td>
                                    <td align="center">{{$employee->employee->phone}}</td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <th align="center" colspan="3">Funcionários escalados</th>
                        </tr>
                        <tr>
                            <th align="center">Nome</th>
                            <th align="center">CPF</th>
                            <th align="center">Telefone</th>
                        </tr>
                        @foreach($data['manages'] as $employee)
                            <tr>
                                <td align="center">{{$employee->employee->name}}</td>
                                <td align="center">{{ cpf($employee->employee->document) }}</td>
                                <td align="center">{{$employee->employee->phone}}</td>
                            </tr>
                        @endforeach
                            @endif
                    </table>
            </tr>
            @endif
        </table>
    </div>
    @endforeach
</div>

<!-- Scripts -->
<style>
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