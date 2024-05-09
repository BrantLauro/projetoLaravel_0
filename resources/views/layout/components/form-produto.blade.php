<input type="text" name="nome" placeholder="Nome" value="{{ old('nome', isset($produto->nome) ? $produto->nome : '') }}">
@error('nome')
    <div>
        <p style="color: red;">{{ $message }}</p>
    </div>
@enderror
<input type="text" name="descricao" placeholder="Descrição" value="{{ old('descricao', isset($produto->descricao) ? $produto->descricao : '') }}">
@error('descricao')
    <div>
        <p style="color: red;">{{ $message }}</p>
    </div>
@enderror
<input type="text" name="peso" placeholder="Peso" value="{{ old('peso',  isset($produto->peso) ? $produto->peso : '') }}">
@error('peso')
    <div>
        <p style="color: red;">{{ $message }}</p>
    </div>
@enderror
<select name="unidade">
    <option value="1">Escolha uma opção</option>
</select>
<br>
@error('unidade')
    <div>
        <p style="color: red;">{{ $message }}</p>
    </div>
@enderror
<button type="submit" class="borda-preta">{{ $acao }}</button>
