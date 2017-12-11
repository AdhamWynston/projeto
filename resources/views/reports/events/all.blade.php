<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatório de Eventos</title>
</head>
<body>
<div class="container">
    <div align="center">
        <h1>Relatório de Eventos</h1>
    </div>
    <div class="row">
        <div>
            <h3>Data da emissão: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</h3>
        </div>
        <div>
                @foreach ($events as $event)
                <table border="1">
                <tr>
                    <th colspan="2">Evento: {{ $event->name }}</th>
                </tr>
                <tr>
                    <td>
                        <div><b>Situação:</b>
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
                            </div>
                        <div><b>Inicío:</b> {{ Carbon\Carbon::parse($event->startDate)->format('d/m/Y H:i') }}</div>
                        <div><b>Termíno:</b> {{ Carbon\Carbon::parse($event->endDate)->format('d/m/Y H:i') }}</div>
                        <div><b>Duração</b> {{ $event->duration }} Horas</div>
                        <div><b>Quantidade de Seguranças:</b> {{ $event->quantityEmployees }}</div>
                        @if($event->observations !== null)
                            <div><b>Observações:</b> {{ $event->observations }}</div>
                        @else
                            <div><b>Observações: </b>Não foi registrado observações</div>
                        @endif
                    </td>
                    <td>
                        <div><b>Local:</b> {{ $event->local }}</div>
                        <span><b>Cidade:</b> {{ $event->city }}</span>
                        <span><b>-</b> {{ $event->state }}  </span>
                        <d><b>   CEP:</b>{{ $event->zip_code }}</d>
                        <br>
                        @if($event->client->phoneAlternative !== null)
                            <span><b>Telefone Alternativo: </b> {{ $event->client->phoneAlternative }}</span>
                        @endif
                    </td>
                </tr>
                </table>
                    @endforeach
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