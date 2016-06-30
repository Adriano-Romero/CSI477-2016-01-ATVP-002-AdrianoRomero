@extends('layouts.app')

@section('title', "Deletar Produto")

@section('content')

<h1>{{ $produto->nome }}</h1>
<p class="lead">{{ $produto->description }}</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('produtos.index') }}" class="btn btn-info">Back to all produtos</a>
        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Edit produto</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => array('produtos.destroy', $produto->id)
        ]) !!}
            {!! Form::submit('Delete this produto?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop