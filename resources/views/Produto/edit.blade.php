@extends('layouts.app')

@section('title', "Editar produto")

@section('content')
	{{ Form::model($produto, array('route' => array('produtos.update', $produto->id), 'method' => 'PATCH', 'class'=> 'form-horizontal')) }}
	 <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
        {{ Form::label('nome', 'Digite o nome do produto') }}
        {{ Form::text('nome', null, ['class' => 'form-control', 'required' => 'required', 'step' =>'0.01']) }}
        <small class="text-danger">{{ $errors->first('nome') }}</small>
    </div>

    <div class="form-group{{ $errors->has('preco') ? ' has-error' : '' }}">
        {!! Form::label('preco', 'Digite o preço') !!}
        {!! Form::text('preco', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('preco') }}</small>
    </div>

    <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
        {!! Form::label('imagem', 'Insira O endereço da Imagem') !!}
        {!! Form::text('imagem', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('imagem') }}</small>
    </div>

		<div class="btn-group pull-center">
			{!! Form::submit("Atualizar", ['class' => 'btn btn-Add']) !!}
		</div>

	{!! Form::close() !!}
@stop