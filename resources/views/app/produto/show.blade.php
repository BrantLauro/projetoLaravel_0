@extends('app.produto.index')
@section('titulo', 'Ver')

@section('conteudo-produto')
    <h2>{{ $produto->nome }}</h2>
    <br>
    <div style="margin: 0 auto; width:90%">
        <table style="width: 100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Peso</th>
                    <th>Unidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>{{ $produto->unidade }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
