@extends('layouts.app')

@section('title', "Criar Produto")

@section('content')

<h1> Criar produto</h1>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

{{  Form::open(array('action'=> 'ProdutoController@store')) }}

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

    <div >
        {{ Form::submit("Enviar", ['class' => 'btn btn-success']) }}
    </div>

{{ Form::close() }}

@stop