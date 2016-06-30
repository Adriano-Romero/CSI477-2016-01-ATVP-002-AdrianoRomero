@extends('layouts.app')

@section('title', "Listagem de produtos")

@section('content')
	<h1>Lista de Produtos</h1>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

@foreach ($produtos as $produto)
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
       <img src="{{ $produto->imagem }}" style= "height: 70px; width: 70px;"/><br>
		<div class="caption">
		<a href="produtos/{{ $produto->id }}">{{$produto->nome}}</a><br>
		<a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Adicionar procedimento</a>
		<a href="{{ route('produtos.destroy', $produto->id) }}" class="btn btn-primary">Deletar</a>
	  {{$produto->id}}<br>
		R${{$produto->preco}}
		</div>
	</div>
</div>

@endforeach

@stop
<!--

-->
