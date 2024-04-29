@extends('layout.head')
@section('titulo', 'Fornecedores')

@section('main')
    @include('layout.partials.menu-app');
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedores - @yield('titulo')</h1>
        </div>

        <div class="informacao-pagina">
            <div class="menu" style="font-weight: bolder">
                <ul>
                    <li><a href="{{ route('app.fornecedor.novo') }}">Novo</a></li>
                    <li><a href="{{ route('app.fornecedor.pesquisar') }}">Consulta</a></li>
                </ul>
            </div>
            <br>
            @yield('conteudo-fornecedor')
        </div>
    </div>
    @include('layout.partials.rodape')
@endsection


