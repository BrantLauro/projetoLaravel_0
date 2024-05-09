@extends('app.produto.index')
@section('titulo', 'Listar')

@section('conteudo-produto')
<h1>Lista de Produtos</h1>
<br>
<div style="margin: 0 auto; width:90%">
    <table style="width: 100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Peso</th>
                <th>Unidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>{{ $produto->unidade }}</td>
                    <td>
                        <a href="{{route('app.produto.destroy', $produto->id)}}"><button type="submit"  style="width:30%">Excluir</button></a>
                        <a href="{{route('app.produto.edit', $produto)}}"><button type="submit"  style="width:30%">Editar</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nenhum produto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $produtos->links() }}

@endsection