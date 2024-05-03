@extends('app.fornecedor.index')
@section('titulo', 'Editar')

@section('conteudo-fornecedor')
    @component('layout.components.form-fornecedor', [
        'route' => route('app.fornecedor.editar.salvar', ['id' => $fornecedor->id]),
        'method' => 'post',
        'nome' => $fornecedor->nome,
        'site' => $fornecedor->site,
        'uf' => $fornecedor->uf,
        'email' => $fornecedor->email,
        'acao' => 'Editar'])
                    
    @endcomponent
@endsection