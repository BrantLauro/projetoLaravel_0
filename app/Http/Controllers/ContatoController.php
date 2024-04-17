<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato() {
        $par = 0;
        return view("site.contato", compact("par"));
    }

    public function contatoNome(string $nome, ?int $categoria_id = null) {
        $par = 1;
        return view("site.contato", compact("nome","categoria_id", "par"));
    }
}
