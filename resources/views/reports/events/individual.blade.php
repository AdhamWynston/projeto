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
        @foreach ($events as $event)
        <div align="center">
            <h1>Relatório do Evento:  <small>{{ $event->name }}</small></h1>
        </div>
        <div>
            <h3>Situação: <small>
                    @if($event->status === 1)
                        <span> Pendente </span>
                    @elseif($event->status === 2)
                        <span> Aguardando data</span>
                    @elseif($event->status === 3)
                        <span>Em andamento</span>
                    @elseif($event->status === 4)
                        <span>Realizado</span>
                    @elseif($event->status === 5)
                        <span>Cancelado</span>
                    @endif
                </small></h3>
        </div>
        <table width="100%" border="1">
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
                    <div><b>Observações:</b> {{ $event->observations }}</div>
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
                    <th class="tg-center">Seguranças Escalados</th>
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