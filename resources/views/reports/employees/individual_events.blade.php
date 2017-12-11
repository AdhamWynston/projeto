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
        @foreach ($data['employee'] as $employee)
            <div align="center">
                <h2>Funcionário:  <small>{{ $employee->name }}</small></h2>
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
                <tr>
                    <th class="tg-center">Eventos</th>
                </tr>
                @foreach ($data['events'] as $event)
                    <tr>
                        <td>
                            <div><b>Nome do evento:</b> {{$event->event->name }}</div>
                            <div><b>Data de Inicío:</b> {{ Carbon\Carbon::parse($event->event->startDate)->format('d/m/Y H:i') }}</div>
                            <div><b>Data de Termíno:</b> {{ Carbon\Carbon::parse($event->event->endDate)->format('d/m/Y H:i') }}</div>
                            <div><b>Situação:</b>
                                @if($event->event->status === 1)
                                    <span> Pendente </span>
                                @elseif($event->event->status === 2)
                                    <span> Aguardando </span>
                                @elseif($event->event->status === 3)
                                    <span>Em andamento</span>
                                @elseif($event->event->status === 4)
                                    <span>Realizado</span>
                                @elseif($event->event->status === 5)
                                    <span>Cancelado</span>
                                @endif
                            </div>
                            @if($event->event->status === 4)
                                @if($event->check_in != null)
                            <div><b>Entrada do funcionário:</b> {{ Carbon\Carbon::parse($event->check_in)->format('d/m/Y H:i') }}</div>
                                @else
                                    <div><b>Entrada do funcionário:</b> Não Registrado</div>
                                @endif
                                    @if($event->check_out != null)
                            <div><b>Saída do funcionário:</b> {{ Carbon\Carbon::parse($event->check_out)->format('d/m/Y H:i') }}</div>
                                @else
                                    @endif
                                @endif
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