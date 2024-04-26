<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class,'index'])->name('site.home');

//Route::redirect('/home', '/');

Route::get('/home', function () {
    return redirect()->route('site.home');
});

Route::get('/sobrenos', [SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');

Route::post('/login', [LoginController::class, 'login'])->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get("/clientes", function() {echo'Clientes';})->name('app.clientes');
    Route::get("/fornecedores", [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get("/produtos", function() {echo'Produtos';})->name('app.produtos');
});

Route::fallback(function(){
    echo 'Página não encontrada!!!';
});

