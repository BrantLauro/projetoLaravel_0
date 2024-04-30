@extends('app.fornecedor.index')
@section('titulo', 'Pesquisa')

@section('conteudo-fornecedor')
    @component('layout.components.form-fornecedor', [
        'route' => route('app.fornecedor.pesquisar'),
        'method' => 'get',
        'nome' => request()->nome ?? '',
        'site' => request()->site ?? '',
        'uf' => request()->uf ?? '',
        'email' => request()->email ?? '',
        'acao' => 'Pesquisar'])
                    
    @endcomponent
@endsection