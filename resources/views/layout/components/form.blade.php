<form action="{{ route('site.contato')}}" method="POST">
    @csrf
    <input type="text" value="{{ old('nome') }}" placeholder="Nome" name="nome" class="{{ $style }}">
    <br>
    @error('nome')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" name="telefone" class="{{ $style }}">
    <br>
    @error('telefone')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <input type="text" value="{{ old('email') }}" placeholder="E-mail" name="email" class="{{ $style }}">
    <br>
    @error('email')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <select class="{{ $style }}" name="motivo_contatos_id">
        <option value="">Escolha uma opção</option>
        @foreach ($motivosContato as $motivoContato )
            <option value="{{ $motivoContato->id }}" {{ old('motivo_contatos_id') == $motivoContato->id ? 'selected' : '' }}>{{ $motivoContato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    @error('motivo_contatos_id')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <textarea class="{{ $style }}" name="mensagem">@php if(!empty(old('mensagem'))) echo old('mensagem');else echo 'Preencha aqui sua mensagem!';@endphp</textarea>
    <br>
    @error('mensagem')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <button type="submit" class="{{ $style }}">ENVIAR</button>
</form>

{{ $slot }}
