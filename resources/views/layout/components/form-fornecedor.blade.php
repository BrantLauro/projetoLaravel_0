<form action="{{ $route }}" method="post" style="width: 30%; margin: 0 auto;">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
    @error('nome')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <input type="text" name="site" placeholder="Site" value="{{ old('site') }}">
    @error('site')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <input type="text" name="uf" placeholder="UF" value="{{ old('uf') }}">
    @error('uf')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
    @error('email')
        <div><p style="color: red;">{{ $message }}</p></div>
    @enderror
    <button type="submit" class="borda-preta">Adicionar</button>
</form>