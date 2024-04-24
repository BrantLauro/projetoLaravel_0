@extends('layout.head')
@section('titulo', 'Contato')

@section('main')
    @include('layout.partials.menu');

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @php
                    $style = 'borda-preta'
                @endphp
                @component('layout.components.form', compact('style', 'motivosContato'))
                    <p>
                        Respoderemos o mais rápido possível!
                    </p>
                @endcomponent
            </div>
        </div>
    </div>
    @include('layout.partials.rodape')
@endsection

