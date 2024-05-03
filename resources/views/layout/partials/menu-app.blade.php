<div class="topo">

    <div class="logo">
       <a href="{{ route('app.home.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home.index') }}">Home</a></li>
            <li><a href="{{ route('app.cliente.index') }}">Clientes</a></li>
            <li><a href="{{ route('app.fornecedor.index') }}">Fornecedores</a></li>
            <li><a href="{{ route('app.produto.index') }}">Produtos</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>