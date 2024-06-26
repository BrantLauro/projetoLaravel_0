<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class,'index'])->name('site.home');

//Route::redirect('/home', '/');

Route::get('/home', function () {
    return redirect()->route('site.home');
});

Route::get('/sobrenos', [SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato.salvar');

Route::get('/login', [LoginController::class, 'index'])->name('site.login');

Route::post('/login', [LoginController::class, 'login'])->name('site.login.salvar');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home.index');

    Route::get('/clientes', [ClienteController::class, 'index'])->name('app.cliente.index');

    Route::prefix('/fornecedores')->group(function() {
        Route::get('/', function() {
            return redirect()->route('app.fornecedor.index');
        });
        Route::get('/listar', [FornecedorController::class, 'index'])->name('app.fornecedor.index');
        Route::get('/pesquisar', [FornecedorController::class, 'pesquisa'])->name('app.fornecedor.pesquisar');

        Route::get('/novo', [FornecedorController::class, 'novo'])->name('app.fornecedor.novo');
        Route::post('/novo', [FornecedorController::class, 'salvar'])->name('app.fornecedor.novo.salvar');

        Route::get('/excluir/{id}', [FornecedorController::class, 'delete'])->name('app.fornecedor.deletar');

        Route::get('/editar/{id}', [FornecedorController::class, 'update'])->name('app.fornecedor.editar');
        Route::post('/editar/{id}', [FornecedorController::class, 'update'])->name('app.fornecedor.editar.salvar');
    });

    Route::resource('produto', ProdutoController::class)->names([
        'index' => 'app.produto.index',
        'create' => 'app.produto.create',
        'store' => 'app.produto.store',
        'show' => 'app.produto.show',
        'edit' => 'app.produto.edit',
        'update' => 'app.produto.update',
        'destroy' => 'app.produto.destroy',
    ]);
    
    Route::get('/sair', [LoginController::class, 'logout'])->name('app.sair');
});

Route::fallback(function(){
    echo 'Página não encontrada!!!';
});

