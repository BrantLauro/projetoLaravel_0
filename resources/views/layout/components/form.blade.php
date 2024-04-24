<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" value="{{ old('nome') }}" placeholder="Nome" name="nome" class="{{ $style }}">
    <br>
    <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" name="telefone" class="{{ $style }}">
    <br>
    <input type="text" value="{{ old('email') }}" placeholder="E-mail" name="email" class="{{ $style }}">
    <br>
    <select class="{{ $style }}" name="motivo_contato">
        <option value="">Escolha uma opção</option>
        @foreach ($motivosContato as $key => $motivoContato )
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }}>{{ $motivoContato }}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $style }}" name="mensagem">@php if(!empty(old('mensagem'))) echo old('mensagem');else echo 'Preencha aqui sua mensagem!';@endphp</textarea>
    <br>
    <button type="submit" class="{{ $style }}">ENVIAR</button>
</form>

{{ $slot }}
