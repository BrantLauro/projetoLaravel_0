@extends('app.produto.index')
@section('titulo', 'Novo')

@section('conteudo-produto')
<form action="{{ route('app.produto.store') }}" method="POST" style="width: 30%; margin: 0 auto;">
    @csrf

    @component('layout.components.form-produto', ['acao' => 'Adicionar'])
    @endcomponent
</form>
@endsection