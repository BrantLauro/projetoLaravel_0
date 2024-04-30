@extends('app.fornecedor.index')
@section('titulo', 'Novo')

@section('conteudo-fornecedor')
    @component('layout.components.form-fornecedor', [
        'route' => route('app.fornecedor.novo'),
        'method' => 'post',
        'nome' => old('nome'),
        'site' => old('site'),
        'uf' => old('uf'),
        'email' => old('email'),
        'acao' => 'Adicionar'])
                    
    @endcomponent
@endsection