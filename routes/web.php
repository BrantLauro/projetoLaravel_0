<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class,'index'])->name('site.home');

//Route::redirect('/home', '/');

Route::get('/home', function () {
    return redirect()->route('site.home');
});

Route::get('/sobrenos', [SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class,'contato'])->name('site.contato');

Route::get('/login', function () {echo 'Login';})->name('site.login');

Route::group(["prefix"=> "app"], function () {
    Route::get("/clientes", function() {echo'Clientes';})->name('app.clientes');
    Route::get("/fornecedores", [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get("/produtos", function() {echo'Produtos';})->name('app.produtos');
});

Route::fallback(function(){
    echo 'Página não encontrada!!!';
});

/*
(->) esse operador é conhecido informamente como seta, o manual chama ele de T_OBJECT_OPERATOR serve para acessar propriedades ou métodos de um objeto, para membros estáticos(aqueles que pertencem/compartilhados a classe) utiliza-se o :: Paamayim Nekudotayim.

Outras linguagens como java e C# utilizam ponto no lugar(.) no lugar de (->).


verbo http

get
post
put
patch
delete
options

*/