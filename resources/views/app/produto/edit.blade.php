@extends('app.produto.index')
@section('titulo', 'Editar')

@section('conteudo-produto')
<form action="{{ route('app.produto.update', ['produto' => $produto]) }}" method="POST" style="width: 30%; margin: 0 auto;">
    @csrf
    @method('PUT')
    @component('layout.components.form-produto', [
        'produto' => $produto,
        'acao' => 'Editar'])
    @endcomponent
</form>
@endsection