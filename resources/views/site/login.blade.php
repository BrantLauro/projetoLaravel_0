@extends('layout.head')
@section('titulo', 'Login')

@section('main')
    @include('layout.partials.menu');

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <form action="{{ route('site.login') }}" method="POST" style="margin: 0 40%">
                @csrf
                <input type="text" name="email" placeholder="Usuário" value="{{ old('email') }}">
                @error('email')
                    <div><p style="color: red;">{{ $message }}</p></div>
                @enderror
                <input type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
                @error('password')
                    <div><p style="color: red;">{{ $message }}</p></div>
                @enderror
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    @include('layout.partials.rodape')
@endsection
