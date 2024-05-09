@extends('layout.head')
@section('titulo', 'Produtos')

@section('main')
    @include('layout.partials.menu-app');
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos - @yield('titulo')</h1>
        </div>

        <div class="informacao-pagina">
            <div class="menu" style="font-weight: bolder">
                <ul>
                    <li><a href="{{ route('app.produto.index') }}">Listar</a></li>
                    <li><a href="{{ route('app.produto.create') }}">Novo</a></li>
                    <li><a href="{{ route('app.produto.index') }}">Consulta</a></li>
                </ul>
            </div>
            <br>
            @yield('conteudo-produto')
        </div>
    </div>
    @include('layout.partials.rodape')
@endsection


