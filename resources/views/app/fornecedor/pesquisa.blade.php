@extends('app.fornecedor.index')
@section('titulo', 'Pesquisa')

@section('conteudo-fornecedor')
    @component('layout.components.form-fornecedor', ['route' => route('app.fornecedor.pesquisar')])
                    
    @endcomponent
@endsection