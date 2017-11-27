@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            {!! Form::open(['route' => 'clients.store', 'class' => 'form']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('document', 'Documento') !!}
                {!! Form::text('document', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('zip_code', 'CEP') !!}
                {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('street', 'Rua') !!}
                {!! Form::text('street', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('neighborhood', 'Bairro') !!}
                {!! Form::text('neighborhood', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('number', 'Número') !!}
                {!! Form::text('number', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('complement', 'Complemento') !!}
                {!! Form::text('complement', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Telefone') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-mail') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('defaulting', 'Default') !!}
                {!! Form::text('defaulting', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Criar cliente', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection