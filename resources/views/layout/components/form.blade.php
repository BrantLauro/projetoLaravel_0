<form action="site.contato" method="POST">
    @csrf
    <input type="text" placeholder="Nome" class="{{ $style }}">
    <br>
    <input type="text" placeholder="Telefone" class="{{ $style }}">
    <br>
    <input type="text" placeholder="E-mail" class="{{ $style }}">
    <br>
    <select class="{{ $style }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="">Dúvida</option>
        <option value="">Elogio</option>
        <option value="">Reclamação</option>
    </select>
    <br>
    <textarea class="{{ $style }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $style }}">ENVIAR</button>
</form>

{{ $slot }}
