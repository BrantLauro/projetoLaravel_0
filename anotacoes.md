# Anotações Curso Laravel

## Criar projeto

`composer create-project laravel/laravel nome-do-projeto`

## Artisan Console

Artisan é um console de linha de comando usado para auxiliar na criação do projeto, ele pode ser usado para criar e executar Migrations, Models, Views e Controllers, além de ser usado para muitas outras coisas como rodar o servidor da aplicação

### Comando Uteis

`php artisan serve` -> Sobe a aplicação para o server

`php artisan make:controller CoisaController` -> Cria um controller vazio

`php artisan make:view site.contato` -> Cria uma view vazia

`php artisan make:model Coisa` -> Cria uma classe Model para coisa

`php artisan make:model Coisa -m` -> Cria uma classe Model para coisa e uma migration para a criação da tabela no banco de dados já com as regras de plural

`php artisan make:migration create_coisa_table` -> Cria uma migration já com up() e down() e um Schema::create com id() e timestamps(), o nome deve ter o nome da tabela e mais ou menos a alteração que se vai fazer

`php artisan migrate` -> roda as migrations que ainda não foram rodadas

`php artisan migrate:rollback` -> faz o down da ultima migrate

`php artisan migrate:status` -> mostra informações sobre as migrations

`php artisan migrate:reset` -> faz o rollback de todas as migrations

`php artisan migrate:refresh` -> faz o rollback das migrations e depois executa o comando migrate novamente

`php artisan migrate:fresh` -> faz o drop das migrations e depois executa o comando migrate novamente

(há alterações para todos esses comandos)

### Regras que o Laravel usa para criação do nome das Migrations e posteriormente seu uso no banco de dados

Se o nome do modelo é, por exemplo "ClienteFrequente" (geralmente se cria modelos com nomes no singular) o nome da tabela criada no banco de dados com a migration será cliente_frequentes, o Camel case é quebrando em _ e é adicionado um s no final, mas nem sempre esse forma é a mais correta pois o plural pode ficar errado, para consertar isso se troca manualmente o nome da migration e da tabela e especifica a tabela a ser usada pelo Model. Outro exemplo: o model "Fornecedor" seria criado como "fornecedors" na migration, mas pode se mudar para "fornecedores" e especificar no model.

## Routes

As routes são uma forma simples disponibilizada pelo Laravel para controlar o fluxo de navegação da sua aplicação, elas recebem um método que é um verbo http e realizam uma função de callback, retornam uma view ou chamam um método do controler, mas o ideal é que a rota chame um controller correspondente e esse controller decida o que fazer com a requisição feita pelo usuário através das rotas.

Verbos http mais comuns: 
- get
- post
- put
- patch
- delete
- options

Exemplos:

```
Route::get('/', [PrincipalController::class,'index'])->name('site.home');
```

Nessa rota é usado o verbo http get, e é acessada quando site não tem nada a mais na url além de seu endereço, ou seja é a rota para a "raiz", da aplicação. Nesse caso, quando o usuário acessar a raiz do site, a rota chamara o PrincipalController, mais especificamente no método index() e realizará suas instruções. Além disso, é possível dar um nome para a rota, nesse caso, "site.home", permitindo que ela seja chamada em uma view, por exemplo, de forma mais fácil, usando `route('site.home')`.

Há duas formas de redirecionar um rota para outra, sendo a primeira:

```
Route::redirect('/home', '/');
```

e a segunda: 

```
Route::get('/home', function () {
    return redirect()->route('site.home');
}); 
```

Nos dois casos, ao acessar o site /home será automaticamente redirecionado para a rota /

Se existir um prefixo comum entre as rotas é possível fazer um grupo, exemplo:

```
Route::group(["prefix"=> "app"], function () {
    Route::get("/clientes", function() {echo'Clientes';})->name('app.clientes');
    Route::get("/fornecedores", [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get("/produtos", function() {echo'Produtos';})->name('app.produtos');
});
```

Nesse caso todas essas rotas serão app/alguma-coisa, exemplo: app/clientes

É possível passar parâmetros para as rotas, para serem usados na função, no controller ou nas views chamadas, sendo que pelo método get os parâmetros ficam visíveis na url e no método post não (há outras diferenças entre os dois métodos, mas não vem muito ao caso).

Exemplo:

```
Route::get('/{id}', [CoisaController::class, 'show'])->name('app.show');
```

nesse caso, o parâmetro id, está sendo passado para o Controller na função `show($id)` por meio do método get

É possível também, passar parâmetros opcionais usando uma ? antes do nome do parâmetro como em:

```
Route::get('/user/{name?}', function (?string $name = null) {
    return $name;
});
```

Lembre-se de colocar um valor padrão para o parâmetro para que seja passado um valor caso não seja passado o parâmetro em si. Além disso, use só um ou poucos parâmetros opcionais pois pode gerar confusão na ordem e os parâmetros irem para o lugar errado no caso de serem passados vários parâmetros.

``` 
Route::post('/{id}', [CoisaController::class, 'update'])->name('app.update');
```

Parâmetro passado com o método post, não será passado pela url

### Expressões regulares para os parâmetros


### Rota de contingência


**Obs:** no PHP, o operador (->) é conhecido informalmente como seta, o manual chama ele de T_OBJECT_OPERATOR serve para acessar propriedades ou métodos de um objeto, para membros estáticos(aqueles que pertencem/compartilhados a classe) utiliza-se o :: Paamayim Nekudotayim.

Outras linguagens como java e C# utilizam ponto no lugar(.) no lugar de (->).

## Controllers

Controllers são a camada de aplicação para onde os requests feitos pelo usuário são encaminhados para serem resolvidos, é ele que deve chamar as views, criar, ler, atualizar e deletar os dados do banco de dados, etc.

### Chamando uma view passando parâmetros



## Views

Parte Visual da aplicação onde o usuário vai interagir e fazer suas requisições. 

Blade: motor de renderização de views do Laravel, ele permite que você reutilize código de forma muito mais fácil, além de permitir criar layouts e usar o php em conjunto com o HTML sem muita gambiarra e com a sintaxe muito mais limpa.

### Sintaxe Blade

No blade para usar php usa-se o operador @ seguido da função que deseja-se utilizar, por exemplo, para usar um bloco php puro, usa-se no inicio `@php` e `@endphp` no final, além disso, para usar a tag php só para o echo (`<?= 'texto' ?>`) usa-se `{{ 'texto' }}`

#### Diretivas do Blade:

**Obs:** sim, é possível usar tags php entre as diretivas

**@if/@else** -> Equivalente ao if, else do php, exemplo:

```
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif
```

**@unless** -> Equivalente ao if com o operador de negação != do php, exemplo:

```
@unless (Auth::check())
    You are not signed in.
@endunless
```

**@isset** -> equivalente ao isset do php, mas como se fosse um if isset exemplo:

```
@isset($records)
    // $records is defined and is not null...
@endisset
```

**@empty** -> equivalente ao do php, mas como se fosse um if empty exemplo:

```
@empty($records)
    // $records is "empty"...
@endempty
```

**@switch/case** -> equivalente ao Switch/Case do php, exemplo:

```
@switch($i)
    @case(1)
        First case...
        @break
 
    @case(2)
        Second case...
        @break
 
    @default
        Default case...
@endswitch
```

**@for** -> equivalente ao loop for do php, exemplo:

```
@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor
```

**@while** -> equivalente ao loop while do php, exemplo:

```
@while (true)
    <p>I'm looping forever.</p>
@endwhile
```

**@foreach** -> equivalente ao loop foreach do php, exemplo:

```
@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach
```

**@forelse** -> equivalente ao loop foreach do php mas com a possibilidade de desviar o loop para uma diretiva empty caso o array passado como parâmetro estiver vazio, exemplo:

```
@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse
```

Pode ser de interesse: variável $loop.

### Subviews

Com o Blade é possível reutilizar códigos comuns entre as views de forma extremamente simples e elegante, usando subviews criando layouts, partials, templates e components.

**@include** -> equivalente ao include do php, forma mais simples de reutilizar código php, todo o corpo do template é inserido no local da view onde foi incluído, ou seja, é usado para criar views "parciais" exemplo:

```
@include('layout.partials.menu');
```

**@extends** -> forma sofisticada de criar Templates no Blade, uma view que estende um template pode ter partes do seu código inseridas dentro de um layout, para isso, na view de template, deve ser usar a diretiva `@yield('nome-da-section')` onde se deseja injetar código de outra view. Já na view que o layout vai estender, deve-se ter a diretiva `@extends('nome-do-layout')` e o código a ser injetado deve estar entre as diretivas `@section('nome-da-section')` e `@endsection`, também é possível passar só um texto simples usando `@section('nome-da-section', 'texto'), exemplo: 

```
{{-- No layout: --}}

<title>Super Gestão - @yield('titulo')</title>

<body>

    @yield('main');

</body>

{{-- Na view a ser entendida --}}

@extends('layout.head')
@section('titulo', 'Home')

@section('main')

    {{-- Todo o conteúdo que se deseja passar --}}

@endsection

{{-- *Lembrando que toda que a view vista é 
a view de layout acrescida das sections* --}}
```

**@component** -> forma mais sofisticada de incluir "partials" chamados de "components" quando se precisa inserir mais conteúdo ou passar parâmetros, que podem ser passadas por uma array ou por meio do método compact, as variáveis passadas serão acessíveis no corpo do componente, para usar, bastar chamar a diretiva `@component('nome-do-componente', compact('variavel'))` e `@endcomponent` sendo que dentro da diretiva pode-se colocar conteúdo que será passado como uma variável chamada `$slot` e pode ser colocada onde se desejar, exemplo:

```
@component('layout.components.form', ['style' => 'borda-branca texto-branco'])
    <p> Respoderemos o mais rápido possível! </p>
@endcomponent

```
**Obs:**
- Tudo colocado na pasta public pode ser acessado nas views como `asset('Nome do asset')`
- Para colocar um valor default em uma variável caso ela não tenha sido iniciada usa-se ??
- Para enviar formulários via post tem que se usar a diretiva @csrf dentro do corpo do form

## Models

## Migrations

## Eloquent ORM

### Tinker

