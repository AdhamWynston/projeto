@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @component('admin.users.tabs-component',['user'=> $form->getModel()])
                <div class="col-md-12">
                    <h3>Editar usuário</h3>
                    {!! form($form->add('Salvar','submit',[
                        'attr' => ['class'=> 'btn btn-primary btn-block'],
                        'label' => Icon::create('floppy-disk'). ' Editar'
                    ]))
                     !!}
                </div>
            @endcomponent
        </div>
    </div>
@endsection