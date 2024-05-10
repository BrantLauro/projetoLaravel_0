@extends('app.produto.index')
@section('titulo', 'Listar')

@section('conteudo-produto')
<h2>Lista de Produtos</h2>
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
                        <form action="{{ route('app.produto.show', $produto) }}" method="GET" class="inside-form">
                            <button type="submit">Mostrar</button>
                        </form>
                        <form action="{{ route('app.produto.edit', $produto) }}" method="GET" class="inside-form">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="{{ route('app.produto.destroy', $produto) }}"  method="POST" class="inside-form">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="delete">Excluir</button>
                        </form>
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