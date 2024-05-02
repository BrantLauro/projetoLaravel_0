@extends('app.fornecedor.index')
@section('titulo', 'Listar')

@section('conteudo-fornecedor')
<h1>Lista de Fornecedores</h1>
<br>
<div style="margin: 0 auto; width:90%">
    <table style="width: 100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Site</th>
                <th>UF</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fornecedores as $fornecedor)
                <tr>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->site }}</td>
                    <td>{{ $fornecedor->uf }}</td>
                    <td>{{ $fornecedor->email }}</td>
                    <td>
                        <a href="{{route('app.fornecedor.deletar', $fornecedor->id)}}"><button type="submit"  style="width:30%">Excluir</button></a>
                        <a href="{{route('app.fornecedor.editar', $fornecedor->id)}}"><button type="submit"  style="width:30%">Editar</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nenhum fornecedor cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $fornecedores->links() }}

@endsection