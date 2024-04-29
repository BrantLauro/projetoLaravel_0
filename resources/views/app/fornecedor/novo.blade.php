@extends('app.fornecedor.index')
@section('titulo', 'Novo')

@section('conteudo-fornecedor')
    @component('layout.components.form-fornecedor', ['route' => route('app.fornecedor.novo')])
                    
    @endcomponent
@endsection