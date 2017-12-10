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
        <div align="center">
            <h1>Relatório Individual</h1>
        </div>
        @foreach ($data['client'] as $client)
            <div align="center">
                <h2>Cliente:  <small>{{ $client->name }}</small></h2>
            </div>
            <div>
                <h3>Situação: <small>
                        @if($client->status === 1)
                            <span> Ativado </span>
                        @elseif($client->status === 0)
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
                        <div><b>CPF:</b> {{ cpf($client->document) }}</div>
                        <div><b>E-mail:</b> {{ $client->email }}</div>
                        <div><b>Telefone: </b> {{ $client->phone }}</div>
                        @if($client->phoneAlternative !== null)
                            <span><b>Telefone Alternativo: </b> {{ $client->phoneAlternative }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="tg-center">Endereço</th>
                </tr>
                <tr>
                    <td>
                        <div><b>CEP:</b> {{ $client->zip_code }}</div>
                        <span><b>Cidade:</b> {{ $client->city }}</span>
                        <span><b>-</b> {{ $client->state }}  </span>
                        <div><b>Rua: </b> {{ $client->street }}</div>
                        <div><b>Setor: </b> {{ $client->neighborhood }}</div>
                        <div><b>Número: </b> {{ $client->number }}</div>
                        @if($client->complement !== null)
                            <div><b>Complemento: </b> {{ $client->complement }}</div>
                            @endif
                    </td>
                </tr>
                <tr>
                    <th class="tg-center">Eventos</th>
                </tr>
                @foreach ($data['events'] as $event)
                    <tr>
                        <td>
                            <div><b>Nome do evento:</b> {{$event->name }}</div>
                            <div><b>Data de Inicío:</b> {{ Carbon\Carbon::parse($event->startDate)->format('d/m/Y H:i') }}</div>
                            <div><b>Data de Termíno:</b> {{ Carbon\Carbon::parse($event->endDate)->format('d/m/Y H:i') }}</div>
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

                        </td>
                    </tr>
                    @endforeach
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